<?php

namespace App\Http\Controllers\Api\MercadoLibre;

use Illuminate\Http\Request;
use App\Src\Meli\MeliMessage;
use App\Http\Controllers\Api\BaseController;

class MessageController extends BaseController
{

    private $meli_message;

    public function __construct(MeliMessage $meli_message)
    {
        parent::__construct();

        $this->meli_message = $meli_message;
    }

    public function publish_message()
    {
        $payload = request()->all();

        $response = $this->meli_message->publish_message($payload);

        return response()->json($response, 201);

    }
}
