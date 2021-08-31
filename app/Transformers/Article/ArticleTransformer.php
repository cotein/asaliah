<?php

namespace App\Transformers\Article;

use App\Src\Models\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'id' => $article['id'],
            'name' => strtoupper($article['name']),
            'measure_unity' => $article->measure_unity->name,
            'accounting_account_id' => $article->accounting_account_id,
        ];
    }
}
