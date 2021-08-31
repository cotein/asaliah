<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Picture;
use App\Src\Models\Product;
use Illuminate\Http\Request;
use App\Src\Meli\MeliPictures;
use App\Src\Tools\StdClassTool;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use MahdiMajidzadeh\LaravelUnsplash\Photo;

class VariationController extends Controller
{
    const CRITICAL_STOCK = 5;
    
    protected $unsplash;
    
    protected $meli_pictures;

    public function __construct()
    {
        $this->unsplash  = new Photo();

        $this->meli_pictures = new MeliPictures;
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //dd($data);
        $var = collect(json_decode($data['variation'], true))->toArray();

        $files = collect($data['file']);

        $product = Product::find($var['product_id']);
   
        $number = $product->variations()->count();

        $variation = $product->variations()->create([
            'product_id' => $product->id,
            'seller_custom_field' => $product->seller_custom_field . '-' . (string) $number,
            'attribute_combinations' =>  $var['attribute_combinations'],
            'attributes' => $var['attributes'],
        ]);
        
        $variation->stock()->create([
            'variation_id' => $variation->id,
            'total_stock' => $var['available_total'],
            'available_quantity_meli' =>$var['available_quantity'],
            'published_meli_history' => 0,
            'available_quantity_here' => 0,
            'published_here_history' => 0,
            'sold_on_meli' => 0,
            'sold_on_here' => 0,
            'critical_stock' => self::CRITICAL_STOCK,
        ]);
        
        if ($request->has('file')) {
            
            $files->each(function($image, $key) use($product, $request) {
                $product->addMedia($request->file[$key])->toMediaCollection('variations');
            });

            $product->getMedia('variations')->each(function($image) use($product) {
                
                $pic = $this->meli_pictures->process_pictures(auth()->user()->company->mercadoLibre->meli_token, $image->getFullUrl());
                
                $img = StdClassTool::toArray($pic['body']);
                //dd($img);
                sleep(0.3);
                
                $picture = new Picture;
                $picture->product_id = $product->id;
                $picture->meli_id = $img['id'];
                $picture->size = $img['variations'][0]['size'];
                $picture->quality = null;
                $picture->max_size = $img['max_size'];
                $picture->url = $img['variations'][0]['url'];
                $picture->secure_url = $img['variations'][0]['secure_url'];
                $picture->save(); 


                $result = $this->meli_pictures->add_picture_to_product(auth()->user()->company->mercadoLibre->meli_token, $product->meli_id, $img['id']);
                
                activity('UpdateImage')
                    ->withProperties(['Product' => $product->meli_id])
                    ->log(collect($result)->toJson());
            });
        }

        return response()->json($product, 201);
        
    }
}
