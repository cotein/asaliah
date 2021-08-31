<?php

namespace App\Src\Models;

use App\Src\Models\Iva;
use App\Src\Models\Product;
use App\Src\Models\PriceList;
use Illuminate\Database\Eloquent\Model;

class PedidoClienteItem extends Model
{
    protected $guarded = [];

    protected $table = 'pedidos_clientes_items';

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function price_list()
    {
        return $this->hasOne(PriceList::class, 'id', 'pricelist_id');
    }

    public function iva()
    {
        return $this->hasOne(Iva::class, 'code', 'iva_id');
    }
}
