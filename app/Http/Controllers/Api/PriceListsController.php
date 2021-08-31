<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Product;
use Illuminate\Http\Request;
use App\Src\Models\PriceList;
use App\Http\Controllers\Controller;
use App\Src\Models\PriceListProduct;
use App\Transformers\PriceLists\PriceListTransformer;
use App\Http\Requests\PriceList\NewPriceListFormRequest;
use App\Transformers\PriceLists\PriceListsByProductTransformer;
use Exception;

class PriceListsController extends Controller
{
    public function index()
    {
        $price_lists = PriceList::all();

        return response()->json($price_lists, 200);
    }

    public function enablePriceList()
    {
        $price_lists = PriceList::where('enable', 1)->get();

        return response()->json($price_lists, 200);
    }

    public function store(NewPriceListFormRequest $request)
    {
        $pl = $request->price_list;
        
        $price_list = new PriceList;
        $price_list->name = strtoupper($pl['name']);
        $price_list->benefit = $pl['benefit'];
        $price_list->enable = true;
        $price_list->save();

        $price_list = fractal($price_list, new PriceListTransformer())->toArray()['data'];

        return response()->json($price_list, 201);
    }

    public function getPriceListsOfAProduct()
    {
        //$p = Product::find(request()->product_id);

        $pid = request()->product_id;

        $pl = PriceListProduct::where('product_id', $pid)->get();
        
        $l = fractal($pl, new PriceListsByProductTransformer())->toArray()['data'];

        return response()->json($l, 200);
        
    }

    public function updatePriceProductOnPriceList()
    {
        $plpr = PriceListProduct::where('pricelist_id', request()->pricelist_id)
                ->where('product_id', request()->product_id)
                ->update(
                    ['price' => request()->new_val]
                );
        return response()->json($plpr, 204);
    }

    public function update_benefit()
    {
        $pl = PriceList::find(request()->price_list_id);

        if (!$pl->enable){
            throw new Exception('La lista de precios debe estar activa para modificar su beneficio.');
        }

        $pl->benefit = request()->benefit;
        $pl->save();

        return response()->json($pl, 201);
    }
}
