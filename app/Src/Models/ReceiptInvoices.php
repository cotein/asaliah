<?php

namespace App\Src\Models;

use App\Src\Models\SaleInvoice;
use Illuminate\Database\Eloquent\Model;

class ReceiptInvoices extends Model
{
    protected $guarded = [];
    
    /* public function invoice()
    {
        return $this->hasOne(SaleInvoice::class, 'id', 'invoice_id');
    } */
}
