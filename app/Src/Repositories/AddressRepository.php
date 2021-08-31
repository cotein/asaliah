<?php

namespace App\Src\Repositories;

use App\Src\Models\Address;

class AddressRepository 
{
    protected $address;
    
    public function __construct()
    {
        $this->address = new Address;
    }

    public function store($data)
    {
        
    }
}
