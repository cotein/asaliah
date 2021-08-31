<?php

namespace App\Src\Models;

use App\Src\Models\State;
use App\Src\Models\MovementType;
use App\Src\Models\AccountingAccount;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    public function type()
    {
        return $this->hasOne(TaxType::class, 'id', 'tax_type_id');
    }

    public function accounting_account()
    {
        return $this->hasOne(AccountingAccount::class, 'id', 'accounting_account_id');
    }

    public function movement()
    {
        return $this->hasOne(MovementType::class, 'id', 'movement_type_id');
    }

    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }
}
