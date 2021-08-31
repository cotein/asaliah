<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Src\Models\ReceiptPaymentToProvider;

class ReceiptPaymentToProviderReceipt extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    public function receipt()
    {
        return $this->belongsTo(ReceiptPaymentToProvider::class, 'receipt_provider_id', 'id');
    }
}
