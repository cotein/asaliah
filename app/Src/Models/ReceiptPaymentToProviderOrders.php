<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;
use App\Src\Models\ReceiptPaymentToProvider;

class ReceiptPaymentToProviderOrders extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    public function receipt()
    {
        return $this->belongsTo(ReceiptPaymentToProvider::class, 'id', 'receipt_payment_to_provider_id');
    }

    public function order()
    {
        return $this->hasOne(PaymentOrder::class, 'id', 'payment_order_id');
    }
}
