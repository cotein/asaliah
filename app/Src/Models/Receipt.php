<?php

namespace App\Src\Models;

use App\Src\Models\Status;
use App\Src\Models\Customer;
use App\Src\Models\SaleInvoice;
use App\Src\Models\ReceiptInvoices;
use App\Src\Models\ReceiptCancelation;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $guarded = [];
    
    /* public function invoices()
    {
        return $this->hasMany(ReceiptInvoices::class, 'receipt_id', 'id');
    } */

    public function invoices()
    {
        return $this->belongsToMany(SaleInvoice::class, 'receipt_invoices', 'receipt_id', 'invoice_id')
            ->withPivot('total_invoice', 'payment', 'debt');
    }
    
    public function cancelations()
    {
        return $this->hasMany(ReceiptCancelation::class, 'receipt_id', 'id');
    }
    
    

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
    
    public function setNumber()
    {
        $max = $this->max('number');

        if(is_null($max))
        {
            return 1;
        }

        return $max + 1;
    }
}
