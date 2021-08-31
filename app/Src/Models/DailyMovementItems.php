<?php

namespace App\Src\Models;

use App\Src\Models\DailyMovement;
use App\Src\Models\AccountingAccount;
use Illuminate\Database\Eloquent\Model;

class DailyMovementItems extends Model
{
    public function daily_movement()
    {
        return $this->belongsTo(DailyMovement::class, 'id', 'daily_movement_id');
    }

    public function accounting_account()
    {
        return $this->hasOne(AccountingAccount::class, 'accounting_account_id', 'id');
    }

    public function number($daily_movement_id)
    {
        $movement = $this->where('daily_movement_id', $daily_movement_id)->get();
        
        return $movement->count() + 1;
    }

}
