<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class WebHook extends Model
{
    protected $casts = [
        'meli_info' => 'array',
    ];
}
