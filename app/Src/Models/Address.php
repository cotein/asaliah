<?php

namespace App\Src\Models;

use App\Src\Models\City;
use App\Src\Models\State;
use App\Src\Models\Status;
use App\Src\Models\Supplier;
use App\Src\Models\AddressType;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];
    
    public function addressable()
    {
        return $this->morphTo();
    }

    /**
     * //TODO
     * Crear modelo Country y migración
     */
    /* public function country()
    {
        return $this->hasOne(Country::class);
    } */

    public function state()
    {
        return $this->hasOne(State::class, 'id', 'province_id');
    }

    /* public function city()
    {
        //return $this->hasMany(City::class, 'cp', 'cp');
        return $this->hasOne(City::class, 'id', 'city_id');
    } */

    public function type()
    {
        return $this->hasOne(AddressType::class, 'id', 'type_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    
}
