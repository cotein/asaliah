<?php

namespace App\Src\Models;

use App\Src\Models\Publication;
use Illuminate\Database\Eloquent\Model;

class WebHookQuestion extends Model
{

    protected $table = 'web_hook_questions';

    protected $casts = [
        'from' => 'array'
    ];

    
}
