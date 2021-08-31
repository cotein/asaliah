<?php

namespace App\Src\Models;

use App\Src\Models\Receipt;
use App\Src\Models\PaymentType;
use App\Src\Models\SaleInvoice;
use Illuminate\Database\Eloquent\Model;

class ReceiptCancelation extends Model
{
    protected $guarded = [];
    
    public function type()
    {
        return $this->hasOne(PaymentType::class, 'id', 'payment_type_id');
    }

    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }

    public function invoice()
    {
        return $this->hasOne(SaleInvoice::class, 'id', 'invoice_id');
    }

    public function receipt()
    {
        return $this->belongsTo(Receipt::class, 'receipt_id', 'id');
    }

    public function receipt_cancelation()
    {
        return $this->hasMany(Receipt::class, 'id', 'receipt_id_cancelation');
    }

    
}
