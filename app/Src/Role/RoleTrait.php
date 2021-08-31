<?php

namespace App\Src\Role;

trait RoleTrait 
{
    public function hasRole($role)
    {
        if ($this->rol->name == strtoupper($role)) {
            return true;
        }

        return false;
    }

    public function getRole()
    {
        return $this->rol->name;
    }
}
