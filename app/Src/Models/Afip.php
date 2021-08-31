<?php

namespace App\Src\Models;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Afip extends Model
{
    protected $table = 'afip';

    public function isActive()
    {
        $date =  new Date;

        $currentTime    = $date->parse($date->now());
        
        $expirationTime = $date->parse($this->expiration_time)->subMinutes(15);

        return $expirationTime->greaterThanOrEqualTo($currentTime);
        
    }
}
