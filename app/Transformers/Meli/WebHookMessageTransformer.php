<?php

namespace App\Transformers\Meli;

use App\Src\Tools\StdClassTool;
use App\Src\Models\WebHookMessages;
use League\Fractal\TransformerAbstract;

class WebHookMessageTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(WebHookMessages $whm)
    {
        return [
            'order_id' => $whm->resource_id,
            'from' => (is_string($whm->from)) ? StdClassTool::jsonDecode($whm->from, true) : $whm->from,
            'to' => (is_string($whm->to)) ? StdClassTool::jsonDecode($whm->to, true) : $whm->to,
            'created_at' => $whm->created_at,
            'text' => (is_string($whm->text)) ? StdClassTool::jsonDecode($whm->text, true) : $whm->text
        ];
    }
}
