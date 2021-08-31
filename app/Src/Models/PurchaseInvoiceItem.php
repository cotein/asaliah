<?php

namespace App\Src\Models;

use App\Src\Models\Iva;
use App\Src\Models\Article;
use App\Src\Models\PurchaseInvoice;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceItem extends Model
{
    protected $guarded = [];
    
    public function purchase_invoice()
    {
        return $this->belongsTo(PurchaseInvoice::class, 'id', 'puechase_invoices_id');
    }

    public function article()
    {
        return $this->hasOne(Article::class, 'id', 'article_id');
    }

    public function iva()
    {
        return $this->hasOne(Iva::class, 'id', 'iva_id');
    }
}
