<?php

namespace App\Http\Controllers\Api\MercadoLibre;

use Illuminate\Http\Request;
use App\Src\Meli\MeliQuestions;
use App\Src\Tools\StdClassTool;
use App\Http\Controllers\Api\BaseController;

class MeliQuestionController extends BaseController
{
    public function __construct(MeliQuestions $questions)
    {
        parent::__construct();

        $this->questions = $questions;
    }

    public function question_by_user_and_product()
    {
        dd(request()->all());

        $data = $this->questions->orders_by_seller(auth()->user()->company->mercadoLibre->meli_token);
    }

    public function answer_question()
    {
        $response = $this->questions->answer_question(auth()->user()->company->mercadoLibre->meli_token, request()->question_id, request()->text);

        $data = StdClassTool::toArray($response);

        if (array_key_exists('error', $data['body'])) 
            throw new \Exception('Hubo un error'); 
        
        return response()->json($data, 200);
    }
}
