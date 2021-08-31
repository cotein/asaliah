<?php
namespace App\Src\Unsplash;

use MahdiMajidzadeh\LaravelUnsplash\Search;

class SearchUnSplash 
{
    private $search;
    private $photos;
    private $collection;
    private $url;

    public function __construct()
    {
        $this->search = new Search();
    }

    public function search($data, $quantity = 1)
    {
        $params = [
            'page' => rand(1,25),
            'per_page' => $quantity,
        ];

        $this->collection =  $this->search->photo($data, $params)->get();

        return $this;
    }

    public function getCleanUrls()
    {
        $results = collect($this->collection->results);

        $this->photos = $results->map(function($r){
            return $r->urls->regular;
        });

        return $this;
    }

    public function url()
    {
        $urls = collect($this->photos);

        $this->url = $urls->random();

        return $this;
    }

    public function getUrlResized($w = null, $h = null)
    {
        if (is_null($w) && is_null($h)) {
            return $this->url;
        }

        return $this->url . '&w=' . $w . '&h=' . $h;
    }
}
