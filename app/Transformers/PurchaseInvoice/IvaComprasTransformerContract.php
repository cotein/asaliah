<?php

namespace App\Transformers\PurchaseInvoice;


interface IvaComprasTransformerContract
{
    const MONOTRIBUTO = 6;

    const NO_GRAVADO = 2;
    
    const EXENTAS = 3;

    const PERCEP_IIBB_ID = 1;
    
    const PERCEP_IVA_ID = 2;
    
    const IMPUESTOS_NACIONALES = 3;
    
    const IMPUESTOS_INTERNOS = 4;
    
    const IMPUESTOS_MUNICIPALES = 5;
    
    const OTROS_IMPUESTOS = 6;

    const IVA_21 = 6;
    const IVA_105 = 5;
    const IVA_27 = 7;
    const IVA_5 = 9;
    const IVA_25 = 10;
}
