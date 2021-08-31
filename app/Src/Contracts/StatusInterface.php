<?php

namespace App\Src\Contracts;


interface StatusInterface
{
        const ACTIVO = 1;
        const PUBLICADO = 2; 
        const PAUSADO = 3;
        const REVISION = 4;
        const NO_PUBLICADO = 5;
        const PENDIENTE = 6;
        const ELIMINADO = 7;
        const PRIMER_CONTACTO = 8;
        const LISTADO = 9;
        const REMITIDO = 10;
        const FACTURADO = 11;
        const EN_PRODUCCION = 12; 
        const EN_STOCK = 13;
        const CROSS_OVER = 14;
        const DESPACHADO = 15;
        const ENTREGADO = 16;
        const REPORTADO = 17;
}
