<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Src\Repositories\App\ArticleRepository;
use App\Transformers\Article\ArticleTransformer;

class ArticleController extends Controller
{
    public function __construct(ArticleRepository $article_repo)
    {
        $this->article_repo = $article_repo;
    }

    public function index()
    {
        $arts = Article::orderBy('name')->get();

        $articles = fractal($arts, new ArticleTransformer())->toArray()['data'];

        return response()->json($articles, 200);
    }

    public function store()
    {
        $article =  $this->article_repo->create(request()->article);

        return response()->json($article, 201);
    }

    public function find_article_by_name()
    {
        $name = request()->name;

        $art = Article::search($name)->get();

        $articles = fractal($art, new ArticleTransformer())->toArray()['data'];

        return response()->json($articles, 200);
    }
}
