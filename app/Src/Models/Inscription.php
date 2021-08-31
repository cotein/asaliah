<?php

namespace App\Src\Models;

use App\Src\Models\Supplier;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class);
    }
}
