<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use App\Src\Models\Category;
use Illuminate\Http\Request;
use App\Src\Meli\MeliCategories;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Category\CategoryFormRequest;
use App\Transformers\Categories\CategoryTransformer;

class CategoriesController extends Controller
{
    const PARENT_CATEGORY = 0;

    public function store(CategoryFormRequest $request)
    {
        /* $a = Category::all();

        $a->map(function($i){
            $i->slug =  Str::slug($i->name);
            $i->save();
        }); */
        $att = $request->all();
        
        $filteredAttributes = collect($att['attributes'])->reject(function ($value, $key) {
            return $value['name'] == null;
        })->toArray();

        $category = new Category;
        $category->name = strtoupper($request->name);
        $category->parent_id = $request->parent_id;
        $category->slug =  Str::slug($request->name);
        $category->attributes = $filteredAttributes;
        $category->save();

        return response()->json($category, 201);

    }

    public function index()
    {
        $categories = Category::all();
        
        $categories = fractal($categories, new CategoryTransformer())->toArray()['data'];

        return response()->json($categories, 200);
    }
    
    public function parent()
    {
        $categories = Category::where('parent_id', self::PARENT_CATEGORY)
            ->where('active', true)->get();
        
        return response()->json($categories, 200);
    }

    public function child()
    {
        $categories = Category::where('parent_id', request()->category_id)
            ->where('active', true)->get();
        
        return response()->json($categories, 200);
    }

    public function set_status()
    {
        $category = Category::find(request()->category_id);

        $category->active = request()->status;
        $category->save();
        
        return response()->json($category, 201);
    }
}
