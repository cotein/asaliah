<?php

namespace App\Src\Models;

use App\Src\Models\Bank;
use App\Src\Models\PaymentType;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ReceiptPaymentToProviderCancelationDocument extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $guarded = [];

    public function type()
    {
        return $this->hasOne(PaymentType::class, 'id', 'payment_type_id');
    }

    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
}
