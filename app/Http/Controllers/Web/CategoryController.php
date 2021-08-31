<?php

namespace App\Http\Controllers\Web;

use App\Src\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\PublicationHere\NestableCategoryTransformer;

class CategoryController extends Controller
{

    public function index()
    {
        //$categories = Category::nested()->get();
        $categories = Category::all();
        //dd($categories);
        
        return response()->json($categories, 200);
    }

    

    
    


}