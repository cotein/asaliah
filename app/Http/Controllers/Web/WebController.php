<?php

namespace App\Http\Controllers\Web;

use App\Src\Meli\MeliUsers;
use App\Src\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\PublicationHere\PublicationHereTransformer;

class WebController extends Controller
{
    protected $meliUsers;

    public function __construct()
    {
        $this->meliUsers = new MeliUsers;
    }

    public function root()
    {
        return view('welcome');
    }
    
    public function shop()
    {
        return view('web.listing-left-column');
    }

    public function product($product_slug, $id)
    {
        $product = Product::find($id);

        $detail_product = fractal($product, new PublicationHereTransformer())->toArray()['data'];
        //dd($detail_product);
        return view('web.product')->with('product', $detail_product);

    }

    //////////////////////////////////////////////
    public function create_test_user()
    {
        return $this->meliUsers->create_test_user();
    }

   

}
