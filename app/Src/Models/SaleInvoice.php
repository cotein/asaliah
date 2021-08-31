<?php

namespace App\Src\Models;

use App\User;
use App\Src\Models\Status;
use App\Src\Models\Company;
use App\Src\Models\Receipt;
use App\Src\Models\Voucher;
use App\Src\Models\Customer;
use App\Src\Models\ReceiptInvoices;
use App\Src\Models\SaleInvoiceItem;
use Illuminate\Database\Eloquent\Model;
use App\Src\Models\SaleInvoiceObservation;

class SaleInvoice extends Model
{
    protected $table = 'sales_invoices';

    protected $casts = [
        'afip_data' => 'array'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function voucher()
    {
        return $this->hasOne(Voucher::class, 'id', 'voucher_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(SaleInvoiceItem::class, 'sale_invoice_id', 'id');
    }

    public function receipts()
    {
        return $this->belongsToMany(Receipt::class, 'receipt_invoices', 'invoice_id', 'receipt_id')
            ->withPivot('total_invoice', 'payment', 'debt');
    }

    public function iAmACancelation()
    {
        return $this->hasMany(ReceiptCancelation::class, 'invoice_id', 'id');
    }
    /* public function obs()
    {
        return $this->hasOne(SaleInvoiceObservation::class, 'sale_invoice_id', 'id');
    } */
    

    public function isSearching()
    {
        $this->searching = ! $this->searching;

        $this->save();
    }

    public function paid()
    {
        $this->status_id = Status::PAGADA;

        $this->save();
    }

    public function total()
    {
        return $this->items->sum(function($i){
            return $i->neto_import + $i->iva_import;
        });
    }

    public function pendiente()
    {
        $this->status_id = Status::PENDIENTE;

        $this->searching = false;

        $this->save();
    }
}
