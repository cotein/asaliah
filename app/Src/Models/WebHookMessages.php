<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class WebHookMessages extends Model
{
    protected $casts = [
        'text' => 'array',
        'from' => 'array',
        'to' => 'array',
        'moderation' => 'array',
    ];

    
}
