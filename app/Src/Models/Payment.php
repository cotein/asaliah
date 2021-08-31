<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $casts = [
        'payer' => 'array',
        'additional_info' => 'array',
        'transaction_details' => 'array',
        'fee_details' => 'array',
        'card' => 'array',
    ];

    public function payer()
    {
        return $this->payer;
    }

    public function DocTipo()
    {
        return $this->payer['identification']['type'];

    }

    public function DocNro()
    {
        return $this->payer['identification']['number'];
    }

    public function payer_email()
    {
        return $this->payer['email'];
    }
}
