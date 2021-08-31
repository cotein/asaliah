<?php

namespace App\Http\Controllers\Web;

use App\Src\Models\Brand;
use App\Src\Models\Product;
use App\Src\Models\Category;
use App\Src\Models\Publication;
use App\Src\Meli\MeliPublications;
use App\Http\Controllers\Controller;
use App\Transformers\PublicationHere\PublicationHereTransformer;

use Illuminate\Http\Request;

class PublicationController extends Controller
{   
    //TODO: system settings
    const PAGINATION_LIMIT = 50;

    public function index(Request $request)
    {
        //\DB::enableQueryLog();
        
        $filters = $request->filters;

        $see_all = collect($filters['see_all']);
       
        if (! $see_all->isEmpty()) {

            $s = explode(" ", $see_all->toArray()[0]);
        
            $search = collect($s)->map(function($i){
                return '*' . $i . '*';
            })->toArray();

            $products = Product::search($search)->paginate(50);

            $publications_here = fractal($products, new PublicationHereTransformer())->toArray()['data'];

            $response = [
                'pagination' => [
                    'total' => $products->total(),
                    'per_page' => $products->perPage(),
                    'current_page' => $products->currentPage(),
                    'last_page' => $products->lastPage(),
                    'from' => $products->firstItem(),
                    'to' => $products->lastItem()
                ],
                'data' => $publications_here
            ];

        return response()->json($response, 200);

        }
        
        $categories = collect($filters['category']);
        
        $brands = collect($filters['brand']);
        
        $others = collect($filters['others']);
        
        $query = Product::query();

        $query = $query->where('published_here', 1);
        
        $query = $query->orderBy('priority_id', 'DESC');

        if (! $categories->isEmpty()) {

            $query = $query->whereIn('code', $categories->pluck('code')->toArray());

        }

        if (! $brands->isEmpty()) {

            $query = $query->whereIn('brand_id', $brands->pluck('id')->toArray());

        }

        if (! $others->isEmpty()) {
            
            $others->each(function($other) use($query) {
            
                $value_id = $other['value_id'];

                $query = $query->whereHas('variations', function($q) use($value_id) {

                    $q->where('attribute_combinations', 'like', '%"value_id": "'.$value_id.'"%');

                });
            });
            
        }

        $query = $query->paginate(self::PAGINATION_LIMIT);

        $publications_here = fractal($query, new PublicationHereTransformer())->toArray()['data'];

        $response = [
            'pagination' => [
                'total' => $query->total(),
                'per_page' => $query->perPage(),
                'current_page' => $query->currentPage(),
                'last_page' => $query->lastPage(),
                'from' => $query->firstItem(),
                'to' => $query->lastItem()
            ],
            'data' => $publications_here
        ];

        return response()->json($response, 200);
    }

    public function by_category($slug)
    {
        $category = Category::where('slug', $slug)->get()->first();

        $products = $category->products()->orderBy('priority_id', 'DESC')->paginate(12);
        
        $publications_here = fractal($products, new PublicationHereTransformer())->toArray()['data'];

        $response = [
            'pagination' => [
                'total' => $products->total(),
                'per_page' => $products->perPage(),
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'from' => $products->firstItem(),
                'to' => $products->lastItem(),
                'selected_category' => $slug
            ],
            'data' => $publications_here
        ];

        return response()->json($response, 200);
    }

    public function by_brand($slug)
    {
        $brand = Brand::where('slug', $slug)->get()->first();

        $products = $brand->products()->orderBy('priority_id', 'DESC')->paginate(12);
        
        $publications_here = fractal($products, new PublicationHereTransformer())->toArray()['data'];

        $response = [
            'pagination' => [
                'total' => $products->total(),
                'per_page' => $products->perPage(),
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'from' => $products->firstItem(),
                'to' => $products->lastItem(),
                'selected_category' => $slug
            ],
            'data' => $publications_here
        ];

        return response()->json($response, 200);
    }
}
