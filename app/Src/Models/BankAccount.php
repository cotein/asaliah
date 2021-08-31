<?php

namespace App\Src\Models;

use App\Src\Models\Bank;
use App\Src\Models\Money;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    
    public function bank_accountable()
    {
        return $this->morpTo();
    }
    
    public function money()
    {
        return $this->hasOne(Money::class);
    }
    
    public function bank()
    {
        return $this->hasOne(Bank::class);
    }
    
    
}
