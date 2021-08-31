<?php

namespace App\Src\Models;

use Sofa\Eloquence\Eloquence;
use App\Src\Models\PurchaseInvoice;
use App\Src\Models\PurchaserDocument;
use Illuminate\Database\Eloquent\Model;
use App\Src\Models\ReceiptPaymentToProvider;

class Provider extends Model
{
    use Eloquence;

    protected $searchableColumns = ['number', 'name'];

    protected $casts = [
        'datos_generales' => 'array',
        'regimen_general' => 'array',
        'monotributo' => 'array',
        'error_constancia' => 'array',
        'afip_data' => 'array',
        'others' => 'array',
    ];

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function inscription()
    {
        return $this->hasOne(Inscription::class, 'id', 'inscription_id');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function purchase_invoices()
    {
        return $this->hasMany(PurchaseInvoice::class, 'id', 'provider_id');
    }

    public function purchaserDocument()
    {
        return $this->hasOne(PurchaserDocument::class, 'id', 'purchaser_document_id');
    }
    
    public function receipts()
    {
        return $this->hasMany(ReceiptPaymentToProvider::class, 'id', 'provider_id');
    }

    public function payment_orders()
    {
        return $this->hasMany(PaymentOrder::class, 'id', 'provider_id');
    }
}
