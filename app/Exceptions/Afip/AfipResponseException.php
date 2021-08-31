<?php

namespace App\Exceptions\Afip;

use Exception;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Log;

class AfipResponseException extends Exception
{
    public function render($request)
    {
        return response()->json($this->getMessage(), $this->getCode());
    }
}
