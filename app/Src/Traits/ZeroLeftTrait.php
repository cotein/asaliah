<?php

namespace App\Src\Traits;


trait ZeroLeftTrait
{
    public function zeroLeft($data, $lenght)
    {
        return str_pad($data, $lenght, "0", STR_PAD_LEFT);
    }
}
