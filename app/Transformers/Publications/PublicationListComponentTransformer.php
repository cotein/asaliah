<?php

namespace App\Transformers\Publications;

use App\Src\Models\Publication;
use App\Src\Traits\MoneyFormatTrait;
use League\Fractal\TransformerAbstract;

class PublicationListComponentTransformer extends TransformerAbstract
{
    use MoneyFormatTrait;

    public function values($values)
    {
        return collect($values)->map(function($value){
            return [
                'name' => $value->name
            ];
        });
    }

    public function attribute_combinations($attributes)
    {
        return collect($attributes)->map(function($a){
            return [
                'name' => $a->name,
                'values' => $this->values($a->values)
            ];
        });
    }

    public function variations($variations)
    {
        $var = collect($variations);

        if ($var->isEmpty()) {
            return null;
        }

        /* $var->map(function($v){
            if (! is_array($v)) {
                dd($v);
            }
        }); */
        /* dd($variations);
        if (! array_key_exists('id', $variations)) {
            # code...
            dd($variations);
        } */

        return $var->map(function($v){
            if ($v == '') {
                return null;
            }
            return [
                'id' => $v->id,
                'sold_quantity' => $v->sold_quantity,
                'available_quantity' => $v->available_quantity,
                'attribute_combinations' => $this->attribute_combinations($v->attribute_combinations),
            ];
        });
    }

    public function attributes($attributes)
    {
        return collect($attributes)->map(function($attr){
            if ($attr == '') {
                return null;
            }
            return [
                'name' => $attr->name,
                'value_name' => $attr->value_name,
            ];
        });
    }


    public function transform($publication)
    {
        if (property_exists($publication, "attributes")) {
            if ($publication->attributes == "")
            {
                $brand = 'PIAMONDSA';
                $model = 'MODEL';
            }else{
                $brand = collect($publication->attributes)->filter(function($p){
                    return $p['id'] == 'BRAND';
                })->first()['value_name'];
            
                $model = collect($publication->attributes)->filter(function($p){
                    return $p['id'] == 'MODEL';
                })->first();
            }
            
        }else{
            $brand = 'PIAMONDSA';
            $model = 'MODEL';
        }
       
        //dd($publication->body->thumbnail);
        if (property_exists($publication, "body")) {
            return [
                'id'    => $publication->body->id,
                'title' => $publication->body->title,
                'thumbnail'          => (property_exists($publication->body, "thumbnail")) ? $publication->body->thumbnail : '',
                'available_quantity' => (property_exists($publication->body, "available_quantity")) ? $publication->body->available_quantity:0,
                'sold_quantity' => (property_exists($publication->body, "sold_quantity")) ? $publication->body->sold_quantity:0,
                'visits' => 0,
                'price' => $this->DisplayToUserCurrency((property_exists($publication->body, "price")) ? $publication->body->price:0),
                'brand'     => $brand,
                'model'     => ($model == 'MODEL') ? $model : $model['value_name'],
                'variations'=> (property_exists($publication->body, "variations")) ? $this->variations($publication->body->variations):'',
                'status' => $publication->body->status,
                'permalink' => (property_exists($publication->body, "permalink")) ? $publication->body->permalink:0,
                'attributes' => (property_exists($publication->body, "attributes")) ? $this->attributes($publication->body->attributes):null,
                'health' => (property_exists($publication->body, "health")) ? $publication->body->health:0,
            ];
        }

    }
}
