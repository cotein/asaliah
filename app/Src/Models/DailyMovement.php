<?php

namespace App\Src\Models;

use App\Src\Models\Status;
use App\Src\Models\DailyMovementItems;
use Illuminate\Database\Eloquent\Model;

class DailyMovement extends Model
{
    protected $table = 'daily_movements';
    
    public function status()
    {
        return $this->hasOne(Status::class, 'status_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(DailyMovementItems::class, 'daily_movement_id', 'id');
    }

    public function number()
    {
        if ($this->max('number'))
        {
            return $this->max('number') + 1;
        }

        return 1;
    }
}
