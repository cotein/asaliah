<?php
namespace App\Src\Role;

interface HasRolesContract {

    public function hasRole($role);
    public function getRole();
}