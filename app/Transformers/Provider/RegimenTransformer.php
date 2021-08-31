<?php

namespace App\Transformers\Provider;

use App\Src\Models\ProviderRegimen;
use League\Fractal\TransformerAbstract;

class RegimenTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ProviderRegimen $regimen)
    {
        return [
            'id' => $regimen->id,
            'code' => $regimen->code,
            'name' => $regimen->code . ' | ' . $regimen->description,
        ];
    }
}
