<?php

namespace App\Src\Models;


use App\Src\Models\Product;
use App\Src\Models\Provider;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Brand extends Model
{
    use Sluggable;
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    public function suppliers()
    {
        return $this->belongsToMany(Provider::class);
    }
}

