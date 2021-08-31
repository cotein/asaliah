<?php

namespace App\Transformers\Publications;

use App\Src\Traits\MoneyFormatTrait;
use League\Fractal\TransformerAbstract;

class UpdatePrice extends TransformerAbstract
{

    use MoneyFormatTrait;
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($row)
    {

        $variations = collect($row['variations']);

        $var = [];

        if ($variations->isEmpty()) {
            $var = [
                'id' => $row['id'],
                'variations' => $var,
                'price' => $this->CurrencyToMySqlFormat($row['new_price'])
            ];
        }else{

            $var = $variations->map(function($v) use($row) {
                
                return [
                    'id' => $v['id'],
                    'price' =>  $this->CurrencyToMySqlFormat($row['new_price']),
                ];
                
            })->all();
        }

        return [
            'id' => $row['id'],
            'variations' => $var
        ];
    }
}
