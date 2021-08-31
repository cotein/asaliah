<?php

namespace App\Exceptions\Afip;

use Exception;

class NotFoundPerson extends Exception
{
    public function render($request)
    {
        return response()->json($this->getMessage(), $this->getCode());

        //return response()->json('No existe persona con ese CUIT / DNI', 431);
    }
}
