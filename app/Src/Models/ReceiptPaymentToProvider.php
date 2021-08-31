<?php

namespace App\Src\Models;

use App\Src\Models\Status;
use App\Src\Models\Provider;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Src\Models\ReceiptPaymentToProviderOrders;
use App\Src\Models\ReceiptPaymentToProviderReceipt;
use App\Src\Models\ReceiptPaymentToProvidersInvoice;
use App\Src\Models\ReceiptPaymentToProviderCancelationDocument;

class ReceiptPaymentToProvider extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $guarded = [];
    
    public function setNumber()
    {
        $max = $this->max('number');

        if(is_null($max))
        {
            return 1;
        }

        return $max + 1;
    }

    public function orders()
    {
        return $this->hasMany(ReceiptPaymentToProviderOrders::class, 'receipt_payment_to_provider_id', 'id');
    }

    public function receipts()
    {
        //recibos adeudados
        return $this->hasMany(ReceiptPaymentToProviderReceipt::class, 'receipt_payment_to_provider_id', 'id');
    }

    public function cancelation_documents()
    {
        return $this->hasMany(ReceiptPaymentToProviderCancelationDocument::class, 'receipt_payment_to_provider_id', 'id');
    }

    /* public function receipt_with_debt()
    {
        return $this->hasMany(ReceiptPaymentToProviderReceipt::class, 'receipt_payment_to_provider_id', 'id');
    } */

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

  /*   public function invoices()
    {
        return $this->hasMany(ReceiptPaymentToProvidersInvoice::class, 'receipt_payment_to_provider_id', 'id');
    } */

    public function invoices()
    {
        return $this->belongsToMany(PurchaseInvoice::class, 'receipt_payment_to_providers_invoices', 'receipt_payment_to_provider_id', 'invoice_id')
        ->withPivot('paid', 'balance');
    }
}

