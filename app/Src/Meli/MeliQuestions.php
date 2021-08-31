<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;

class MeliQuestions extends MiMeli
{
    public function question_by_user_and_product($token, $item_id, $customer)
    {
        $params = [
            'item' => $item_id,
            'from' => $customer,
        ];
            
        return Meli::withToken($token)->get('/questions/search/', $params);
    }

    public function questions_by_seller($token, $seller_id=null)
    {
        $params = [
            'seller_id' => '438749068',
        ];
            
        return Meli::withToken($token)->get('/questions/search/', $params);
    }

    public function answer_question($token, $question_id, $text)
    {
        $params = [
            "question_id" => $question_id, 
            "text" => $text 
        ];
            
        return Meli::withToken($token)->get('/questions/search/', $params);
    }


}