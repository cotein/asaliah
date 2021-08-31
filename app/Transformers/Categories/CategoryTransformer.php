<?php

namespace App\Transformers\Categories;

use App\Src\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{

    public function attributes($attrs)
    {
        return collect($attrs)->map(function($attribute){
            return strtoupper($attribute['name']);
        })->toArray();
    }
    /**
     * A Fractal transformer.
     *
     * @return array
     */

    public function transform(Category $category)
    {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'attributes' => $this->attributes($category->attributes),
            'status' => $category->active,
            'isFather' => ($category->parent_id == 0) ? 'SI' : 'NO', 
        ];
    }
}
