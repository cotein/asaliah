<?php

namespace App\Src\Models;

use App\Src\Models\PurchaseInvoice;
use Illuminate\Database\Eloquent\Model;

class PaymentOrderItem extends Model
{
    public function purchase_invoice()
    {
        return $this->hasOne(PurchaseInvoice::class, 'id', 'purchase_invoice_id');
    }
}
