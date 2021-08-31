<?php

namespace App\Transformers;

use App\Src\Traits\ZeroLeftTrait;
use App\Src\Traits\DateFormatTrait;
use App\Src\Traits\MoneyFormatTrait;
use League\Fractal\TransformerAbstract;

class TransformerBase extends TransformerAbstract
{
    use DateFormatTrait, MoneyFormatTrait, ZeroLeftTrait;
}
