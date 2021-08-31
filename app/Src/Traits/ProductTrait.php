<?php 
namespace App\Src\Traits;

use App\Src\Models\Brand;

trait ProductTrait
{
    public function save_brand($attributes)
    {
        $attributes = collect($attributes)->filter(function($attr){
            if ($attr->id == 'BRAND') {
                return $attr;
            }
        })->values()->toArray();

        $brand = Brand::where('name', $attributes[0]->value_name)->get();

        if ($brand->isEmpty()) {
            
            $b = new Brand;
            $b->name =  $attributes[0]->value_name;
            $b->description =  $attributes[0]->name;
            $b->value_id =  $attributes[0]->value_id;

            $b->save();

            $b->refresh();

            return $b->id;
        }        

        return $brand->toArray()[0]['id'];
    }

}

?> 


 