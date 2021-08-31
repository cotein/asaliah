<?php

namespace App\Src\Models;

use Nestable\NestableTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use NestableTrait;

    protected $guarded =[];

    protected $fillable = [];

    protected $parent = 'parent_id';

    protected $casts = [
        'attributes' => 'array'
    ];
    
    public function products()
    {
        return $this->hasMany(Product::class, 'code', 'code');
    }

    public function setAttributes($attributes)
    {
        $attrs = [];

        foreach($attributes as $key => $value){
            $attrs[] = strtoupper($value['name']);
        }

        $this->attributes = json_encode($attrs) ;

    }
}   
