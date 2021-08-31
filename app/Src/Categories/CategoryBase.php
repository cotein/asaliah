<?php

namespace App\Src\Categories;

use App\Src\Models\Category;

class CategoryBase
{
    public function multilevel_array_handler($matriz){
        foreach($matriz as $key=>$value){
            if (is_array($value)){
                //si es un array sigo recorriendo
                echo 'key:'. $key;
                echo '<br>';
                self::multilevel_array_handler($value);
            }else{  
                //si es un elemento lo muestro
                echo $key.' : '.$value ;
                echo '<br>';
            }
        }
    }

    public static function handler($path_from_root)
    {
        $pfr = $path_from_root;

        collect($pfr)->each(function($cat, $index) use ($pfr){

            if (is_array($cat)) {

                $category = Category::where('code', $cat['id'])->get();

            }else{

                $category = Category::where('code', $cat->id)->get();
            }

            if ($category->isEmpty()) {

                $index = ($index == 0) ? 0 : $index - 1 ;

                if (is_array($pfr[$index])) {
                    $p = Category::where('code', $pfr[$index]['id'])->get(['id'])->toArray();
                }
                else{

                    $p = Category::where('code', $pfr[$index]->id)->get(['id'])->toArray();
                }
                
                $parent_id = (collect($p)->isEmpty()) ? 0 : $p[0]['id'];

                if (is_array($cat)) {

                    Category::create([
                        'code' => $cat['id'],
                        'name' => $cat['name'],
                        'parent_id' => $parent_id,
                    ]);
    
                }else{
    
                    Category::create([
                        'code' => $cat->id,
                        'name' => $cat->name,
                        'parent_id' => $parent_id,
                    ]);
                }
                
            }
        });
    }

    public function prueba($array)
    {
        return collect($array)->map(function($item, $index){

            $arr = collect($item);
            
            $new_array = collect($arr->get('child'));

            if (! $new_array->isEmpty()) {
                return $item;
            }
            
        })->filter()->values()->toArray();
    }

    /* public function category_process($main_array)
    {
        return collect($main_array)->each(function($array){
            self::show_categories($array);
        });
    } */

    public function show_categories($array)
    {
        return collect($array)->map(function($a){

            $child = collect($a['child']);

            //$a_child = ($child->isEmpty()) ? '' : $child;
            
            if (! $child->isEmpty()) {
                return self::show_categories($child);
            }
            //return $child;
            return [
                'id' =>   $a['id'],
                'name' => $a['name'],
                'slug' => $a['slug'],
                'code' => $a['code'],
                'parent_id' => $a['parent_id'],
                //'child' => $child,
            ];

        })->toArray();
    }
}
