<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaserDocument extends Model
{
    protected $table = 'purchaser_documents';

    public function DocTipo()
    {
        return $this->afip_code;
    }
}
