<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public function scopeGetType($query, $type)
    {
        $v = str_pad($type, 3, '0', STR_PAD_LEFT);

        return $query->where('afip_code', $v);
    }
}
