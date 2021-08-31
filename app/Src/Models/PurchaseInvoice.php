<?php

namespace App\Src\Models;

use App\Src\Models\Tax;
use App\Src\Models\Money;
use App\Src\Models\Status;
use App\Src\Models\Voucher;
use App\Src\Models\PurchaseInvoiceTax;
use App\Src\Models\PurchaseInvoiceItem;
use Illuminate\Database\Eloquent\Model;
use App\Src\Models\ReceiptPaymentToProvider;

class PurchaseInvoice extends Model
{

    const IVA_21_ID = 6;
    const IVA_27_ID = 7;
    const IVA_105_ID = 5;

    public function items()
    {
        return $this->hasMany(PurchaseInvoiceItem::class, 'purchase_invoices_id', 'id');
    }

    public function taxes()
    {
        return $this->hasMany(PurchaseInvoiceTax::class, 'purchase_invoice_id', 'id');
    }

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

    public function receipts()
    {
        return $this->belongsToMany(ReceiptPaymentToProvider::class, 'receipt_payment_to_providers_invoices', 'invoice_id', 'receipt_payment_to_provider_id')
            ->withPivot('paid', 'balance');
    }

    public function money()
    {
        return $this->hasOne(Money::class, 'id', 'moneda_id');
    }

    public function to_pay()
    {
        $this->status_id = Status::A_PAGAR;
        $this->save();
    }

    public function iva21()
    {
        $iva = $this->items->map(function($i){
            if ($i->iva_id == self::IVA_21_ID) {
                return $i;
            }
        })->filter();

        return collect($iva)->sum('iva_import');
    }

    public function iva27()
    {
        $iva = $this->items->map(function($i){
            if ($i->iva_id == self::IVA_27_ID) {
                return $i;
            }
        })->filter();

        return collect($iva)->sum('iva_import');
    }

    public function iva105()
    {
        $iva = $this->items->map(function($i){
            if ($i->iva_id == self::IVA_105_ID) {
                return $i;
            }
        })->filter();

        return collect($iva)->sum('iva_import');
    }

    public function neto()
    {
        return $this->items->map(function($i){
            return $i->quantity * $i->unit_price;
        })->sum();

       
    }
    
}
