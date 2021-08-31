<?php

namespace App\Src\Models;

use App\Src\Models\Tax;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceTax extends Model
{
    protected $guarded = [];

    public function tax()
    {
        return $this->hasOne(Tax::class, 'id', 'tax_id');
    }
}
