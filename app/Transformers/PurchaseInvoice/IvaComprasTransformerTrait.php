<?php

namespace App\Transformers\PurchaseInvoice;


trait IvaComprasTransformerTrait
{
    public function str_pad_left($data, $places, $str)
	{
		return str_pad($data, $places, $str, STR_PAD_LEFT);
	}

	public function currency($import, $places, $str)
    {
        if ($import<0) {
            $importe=number_format($import,2,'','');
            $importe=str_replace('-',0,$importe);
            return str_pad((string)$importe, $places, $str, STR_PAD_LEFT);
        }else{
            //$importe=str_replace('.', '', $import);
            $importe=number_format($import,2,'','');
            return str_pad((string)$importe, $places, $str, STR_PAD_LEFT);
        }
    }
}
