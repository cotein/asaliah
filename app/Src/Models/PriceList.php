<?php

namespace App\Src\Models;

use App\Src\Models\Product;
use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    protected $guarded = [];

    protected $table = 'price_list';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'pricelist_products', 'pricelist_id', 'product_id')->withPivot('price'); 
    }

}
