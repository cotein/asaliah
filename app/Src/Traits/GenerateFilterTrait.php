<?php 
namespace App\Src\Traits;

use App\Src\Models\Brand;
use App\Src\Models\Gender;
use App\Src\Models\Season;
use App\Src\Models\Material;
use App\Src\Models\TypeShoes;


trait GenerateFilterTrait
{
    public function save_gender($attributes)
    {
        
        $attributes = collect($attributes)->filter(function($attr){
            if ($attr->id == 'GENDER') {
                return $attr;
            }
        })->values()->toArray();
        
        if (collect($attributes)->isEmpty()) {
            return;
        }

        $gender = Gender::where('name', $attributes[0]->value_name)->get();

        if ($gender->isEmpty()) {
            
            $g = new Gender;
            $g->name =  $attributes[0]->value_name;
            $g->description =  $attributes[0]->name;
            $g->value_id =  $attributes[0]->value_id;

            $g->save();

            $g->refresh();

            return $g->id;
        }        

        return $gender->toArray()[0]['id'];
    }

    public function save_material($attributes)
    {
        
        $attributes = collect($attributes)->filter(function($attr){
            if ($attr->id == 'FOOTWEAR_MATERIAL' || $attr->id == 'FOOTWEAR_MATERIALS') {
                return $attr;
            }
        })->values()->toArray();
        
        if (collect($attributes)->isEmpty()) {
            return;
        }

        $material = Material::where('name', $attributes[0]->value_name)->get();

        if ($material->isEmpty()) {
            
            $m = new Material;
            $m->name =  $attributes[0]->value_name;
            $m->description =  $attributes[0]->name;
            $m->value_id =  $attributes[0]->value_id;

            $m->save();

            $m->refresh();

            return $m->id;
        }        

        return $material->toArray()[0]['id'];
    }


    public function save_season($attributes)
    {
        $attributes = collect($attributes)->filter(function($attr){
            if ($attr->id == 'RELEASE_SEASON') {
                return $attr;
            }
        })->values()->toArray();

        if (collect($attributes)->isEmpty()) {
            return;
        }

        $season = Season::where('name', $attributes[0]->value_name)->get();

        if ($season->isEmpty()) {
            
            $s = new Season;
            $s->name =  $attributes[0]->value_name;
            $s->description =  $attributes[0]->name;
            $s->value_id =  $attributes[0]->value_id;

            $s->save();

            $s->refresh();

            return $s->id;
        }        

        return $season->toArray()[0]['id'];
    }

    public function save_type_shoes($attributes)
    {
        $attributes = collect($attributes)->filter(function($attr){
            if ($attr->id == 'FOOTWEAR_TYPE') {
                return $attr;
            }
        })->values()->toArray();
        
        if (collect($attributes)->isEmpty()) {
            return;
        }

        $type_shoes = TypeShoes::where('name', $attributes[0]->value_name)->get();

        if ($type_shoes->isEmpty()) {
            
            $ts = new TypeShoes;
            $ts->name =  $attributes[0]->value_name;
            $ts->description =  $attributes[0]->name;
            $ts->value_id =  $attributes[0]->value_id;

            $ts->save();

            $ts->refresh();

            return $ts->id;
        }        

        return $type_shoes->toArray()[0]['id'];
    }

	
    public function save_brand($attributes)
    {
        $attributes = collect($attributes)->filter(function($attr){
            if ($attr->id == 'BRAND') {
                return $attr;
            }
        })->values()->toArray();

        if (collect($attributes)->isEmpty()) {
            return;
        }

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


 