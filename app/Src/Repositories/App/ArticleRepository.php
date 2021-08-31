<?php

namespace App\Src\Repositories\App;

use App\Src\Models\Article;


class ArticleRepository
{
    public function create($article)
    {
        $art = new Article;

        $art->code = strtoupper($article['code']);
        $art->name = strtoupper($article['name']);
        $art->measure_unit_id = $article['measure_unity']['id'];
        $art->accounting_account_id = $article['accounting_account']['id'];
        $art->is_stockeable = ($article['is_stockeable'] == 'SI') ? true : false;

        $art->save();
        $art->refresh();

        return $article;
    }
}
