<?php

namespace App\Src\Models;

use App\Src\Models\DailyMovement;
use Illuminate\Database\Eloquent\Model;

class AccountingYear extends Model
{
    public function daily_movements()
    {
        return $this->hasMany(DailyMovement::class, 'daily_movement_id', 'id');
    }
}
