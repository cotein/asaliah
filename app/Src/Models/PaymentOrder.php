<?php

namespace App\Src\Models;

use App\Src\Models\Voucher;
use App\Src\Models\Provider;
use Illuminate\Database\Eloquent\Model;

class PaymentOrder extends Model
{
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }
   
    public function voucher()
    {
        return $this->hasOne(Voucher::class, 'id', 'voucher_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function items()
    {
        return $this->hasMany(PaymentOrderItem::class, 'payment_order_id', 'id');
    }

}
