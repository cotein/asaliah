<?php

namespace App\Http\Controllers\Web;

use App\Src\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\Products\ListProductsTransformer;
use App\Transformers\PublicationHere\ResultProductSearch;

class ProductController extends Controller
{
    public function index()
    {
        $productsOnSale = Product::find(10)->get();
        //dd($productsOnSale);
        $products = fractal()
            ->collection($productsOnSale, new ListProductsTransformer())
            ->toArray()['data'];
            
        return response()->json($products, 200);
    }

    public function by_category(Request $request)
    {
        $slug = $request->slug;

        //$post = Post::whereSlug($slugString)->get();
        
        $productsOnSale = Product::whereHas('categories', function($q) use($slug){
            $q->where('slug', $slug);
        })->get();

        $products = fractal()
            ->collection($productsOnSale, new ListProductsTransformer())
            ->toArray()['data'];
            
        return response()->json($products, 200);
    }


    public function show(Request $request)
    {
        $productOnSale = Product::where('id', $id)->get();

        $product = fractal()
            ->collection($productOnSale, new ListProductsTransformer())
            ->toArray()['data'];
            
        return response()->json($product, 200);
    }

    public function search_products(Request $request)
    {
        $s = explode(" ", $request->search);
        
        $search = collect($s)->map(function($i){
            return '*' . $i . '*';
        })->toArray();

        $products = Product::search($search)->paginate(6);

        $products_results = fractal()
                ->collection($products, new ResultProductSearch())
                ->toArray()['data'];

        $response = [
            'pagination' => [
                'total' => $products->total(),
                'per_page' => $products->perPage(),
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'from' => $products->firstItem(),
                'to' => $products->lastItem()
            ],
            'data' => $products_results
        ];

        return response()->json($response, 200);
    }

}
