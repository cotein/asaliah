<?php

namespace App\Http\Controllers\Api;

//use App\Src\Models\Media;
use App\Src\Models\Status;
use App\Src\Models\Picture;
use App\Src\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Src\Meli\MeliPictures;
use Spatie\MediaLibrary\Media;
use App\Src\Meli\MeliProductos;
use App\Src\Tools\StdClassTool;
use App\Src\Meli\MeliHandleData;
use App\Src\Traits\ProductTrait;
use App\Events\ProductWasCreated;
use App\Http\Controllers\Controller;
use App\Src\Categories\CategoryBase;
use App\Src\Models\PriceListProduct;
use App\Src\Traits\MoneyFormatTrait;
use Illuminate\Support\Facades\Artisan;
use MahdiMajidzadeh\LaravelUnsplash\Photo;
use App\Http\Controllers\Api\BaseController;
use App\Src\Traits\PublicationTransformerTrait;
use App\Transformers\Products\EditProductTransformer;
use App\Transformers\Products\ListProductsTransformer;
use App\Transformers\Products\FindProductByNameTransformer;
use App\Transformers\Products\AddVariationToProductTransformer;

class ProductController extends BaseController
{
    use MoneyFormatTrait, PublicationTransformerTrait, ProductTrait;
    
    const MAX_PRIORITY = 10;
    
    const ACTIVE_STATUS = 1;
    
    const CRITICAL_STOCK = 10;
    
    const FIRST_VARIATION = 1;
    
    const PESOS = 1;
    
    public function total()
    {
        return Product::count();
    }
    
    public function index()
    {
        $products = Product::paginate(10);

        $products_list = fractal($products, new ListProductsTransformer())->toArray()['data'];
        
        $response = [
            'pagination' => [
                'total' => $products->total(),
                'per_page' => $products->perPage(),
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'from' => $products->firstItem(),
                'to' => $products->lastItem()
            ],
            'data' => $products_list,
        ];

        return response()->json($response, 200);
    }

    public function save_product($request, $product)
    {
        $data = collect($request->all());

        if($data->has('file')){
            $pr = collect(json_decode($data['product'], true))->toArray();
            $categories_path = collect(json_decode($data['categories_path'], true))->toArray();
            $selected_categories_from_root = collect(json_decode($data['selected_categories_from_root'], true))->toArray();
        }else{
            $pr = $data->get('product');
            $categories_path = $data->get('categories_path');
            $selected_categories_from_root = $data->get('selected_categories_from_root');
        }

        $product->supplier_id = $pr['supplier']['id'];
        $product->brand_id = null;
        $product->attr_item_condition = null;
        $product->buying_mode = null;
        $product->category_id = $pr['category_id']; 
        $product->path_from_root = null;
        $product->children_category = null;
        $product->categories_path = $categories_path;
        $product->selected_categories_from_root = $selected_categories_from_root;
        $product->name = $pr['name'];
        $product->code = $pr['code']; 
        $product->name_on_supplier = $pr['name_on_supplier'];
        $product->code_on_supplier = $pr['code_on_supplier']; 
        $product->sub_title = null;
        $product->description = $pr['description'];
        $product->original_price = 0;
        $product->sale_price = 0;
        $product->seller_custom_field = 0;
        $product->meta_keywords = null;
        $product->iva = null;
        $product->slug = Str::slug($pr['name']);
        $product->listing_type = 0;
        $product->money = self::PESOS;
        $product->status_id = Status::ACTIVO;
        $product->priority_id = self::MAX_PRIORITY;
        $product->attributes = $pr['attributes'];

        $product->save();
        
        $product->refresh();

        if($data->has('file')){

            $photos = $product->addMultipleMediaFromRequest(['file'])
                ->each(function ($photo) {
                    $photo->toMediaCollection('products');
                });
        }
        
        collect($pr['price'])->map(function($price, $index) use ($product) {

            if(! is_null($price['price'])){

                $price_list = PriceListProduct::where('product_id', $product->id)->get();
                
                if($price_list->isEmpty())
                {
                    $pl = new PriceListProduct;
                    $pl->pricelist_id = $price['price_list_id'];
                    $pl->product_id = $product->id;
                    $pl->price = $price['price'];
                    $pl->save();

                }else{

                    PriceListProduct::where('pricelist_id', $price['price_list_id'])
                        ->where('product_id', $product->id)
                        ->update(['price'=>$price['price']]);
                }
            }
        });

        return $product;
    }
    
    public function store(Request $request)
    {
        $pr = new Product;
        
        $product = $this->save_product($request, $pr);

        return response()->json($product, 201);
    }

    public function update(Request $request)
    {
        $data = collect($request->all());

        if($data->has('file')){
            $product = collect(json_decode($data['product'], true))->toArray();
        }else{
            $product = $data->get('product');
        }

        $pr = Product::find($product['id']);

        $product = $this->save_product($request, $pr);

        return response()->json($product, 201);
    }

    public function fetchlistingtypes()
    {
        return $this->meliproducts->fetch_listing_types();
    }
    
    public function fetchattributes(Request $request)
    {
        $category = $request->category;

        $attributes = $this->meliproducts->fetch_attributes($category);

        /* if ($this->response_has_error($attributes)) {

            return response()->json($this->response_message($attributes), 500);

        } */

        return response()->json($attributes, 200);
    }
   
    public function fetchsubcategories(Request $request)
    {
        $category = $request->category['code'];

        return $this->meliproducts->fetch_sub_categories($category);
    }

    public function update_ok()
    {
        return response()->json(1);
    }

    public function iva_update(Request $request)
    {
        $product = Product::find($request->product['product_id']);

        $product->iva = $request->iva;
        $product->save();

        return response()->json($product, 200);
    }

    public function findProductByName()
    {
        $product_name = request()->product_name;

        $prs = Product::where('name', 'like', '%' . $product_name . '%')
            ->orWhere('description', 'like', '%' . $product_name . '%')->take(31)->get();

        $products = fractal($prs, new FindProductByNameTransformer())->toArray()['data'];

        return response()->json($products, 200);
    }

    public function findById()
    {
        $product = Product::find(request()->product_id);

        $product = fractal($product, new EditProductTransformer())->toArray()['data'];

        return response()->json($product, 200);
    }

    public function delete_picture()
    {
        $mediaTodelete = Media::find(request()->picture_id)->delete();

        return response()->json(request()->picture_id, 200);
    }
   
}
