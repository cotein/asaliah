<?php

namespace App\Transformers\PublicationHere;

use App\Src\Models\Category;
use League\Fractal\TransformerAbstract;

class NestableCategoryTransformer extends TransformerAbstract
{
    public function children($data)
    {
        if (app()->environment('production')) {
            $url = env('APP_URL');
        }
        
        if (app()->environment('local')) {
            $url = env('APP_URL');
        }

        return collect($data)->map(function($i) use($url) {
            
            $category = Category::find($i['id']);

            $random_product = $category->products->random();

            $random_picture = $random_product->pictures->random()->secure_url;

            return [
                "id" => $i['id'],
                "code" => $i['code'],
                "name" => $i['name'],
                "slug" => $i['slug'],
                "url" => $url . '/categorias/' .  $i['slug'],
                "parent_id" =>$i['parent_id'],
                "random_picture" => $random_picture
            ];
        })->all();
    }
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($nestable)
    {
        return [
            'id' => $nestable['id'],
            'parent_id' => $nestable['parent_id'],
            'parent_name' => $nestable['name'],
            'name' => $nestable['name'],
            'parent_slug' => $nestable['slug'],
            'code' => $nestable['code'],
            'children' => $this->children($nestable['child']),
            'show' => true
        ];
    }
}
