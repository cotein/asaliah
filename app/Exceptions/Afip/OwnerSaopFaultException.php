<?php

namespace App\Exceptions\Afip;

use Exception;

class OwnerSaopFaultException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        dd($this);
    }
}
