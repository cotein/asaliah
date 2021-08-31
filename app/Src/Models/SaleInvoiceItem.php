<?php

namespace App\Src\Models;

use App\Src\Models\Iva;
use App\Src\Models\Product;
use App\Src\Models\SaleInvoice;
use Illuminate\Database\Eloquent\Model;

class SaleInvoiceItem extends Model
{
    protected $guarded = [];

    protected $table = 'sale_invoice_items';

    public function sale_invoice()
    {
        return $this->belongsTo(SaleInvoice::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function iva()
    {
        /**
         * code => código de iva en Afip
         */
        return $this->hasOne(Iva::class, 'id', 'iva_id');
    }


}
