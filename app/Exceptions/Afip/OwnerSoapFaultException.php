<?php

namespace App\Exceptions\Afip;

use Exception;
use Illuminate\Support\Facades\Log;

class OwnerSoapFaultException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        Log::error('Generado por mí: ' . $this->message . ' - Se envía al request - ' . collect($request->all())->toJson());
        
        return response()->json($this->message, 431);
    }
}
