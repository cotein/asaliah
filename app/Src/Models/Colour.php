<?php

namespace App\Src\Models;

use App\Src\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    protected $guarded =[];

    protected $fillable = [];
    
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
