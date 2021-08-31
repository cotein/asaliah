<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class WebHookResponse extends Model
{
    protected $casts = [
        'response' => 'array'
    ];
}
