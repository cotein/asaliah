<?php 
namespace App\Src\Meli;

class MeliHandleData
{
    public $attributes;
    
    public $required_attributes;
    
    public $allow_variations;
    
    public $variation_attribute;

    public $colours;
    
    public $sizes;
    
    public $body;

    public function __construct($data)
    {
        $this->body = collect($data['body']);
    }

    public function fetch_attributes()
    {
        $this->attributes = $this->body->each(function($i){
                return $i;
        })->all(); 

        return $this;
    }

    public function fetch_required_attributes()
    {
        $this->required_attributes = $this->body->filter(function($i){
            
            $tags = collect($i->tags);

            if ($tags->has('required')) {
                return $i;
            }
            
        })->values(); 

        return $this;
    }

    /**
     * variation_attribute: sí al ítem se le especifican variaciones, 
     * este atributo puede ser publicado con un valor distinto para cada variación. 
     * Por ejemplo: cualquier publicación de electrónica que tenga variaciones por color, 
     * sus códigos identificadores de producto pueden cargarse para cada variación. 
     * En el caso que el ítem no tenga variaciones, igualmente se puede cargar un valor 
     * para este atributo
     */
    public function fetch_variation_attribute()
    {
        $this->variation_attribute = $this->body->filter(function($i){
            
            $tags = collect($i->tags);

            if ($tags->has('variation_attribute')) {
                return $i;
            }
            
        })->values(); 

        return $this;
    }
    

    public function fetch_colours_attributes()
    {
        $result = $this->required_attributes->where('id', 'MAIN_COLOR');

        $this->colours = $result->first()->values;

        return $this;
    }

    public function fetch_sizes_attributes()
    {
        $result = $this->required_attributes->where('id', 'SIZE');

        $this->sizes = $result->first()->values;

        return $this;
    }

    public function fetch_allow_variations_attributes()
    {
        $this->allow_variations = $this->body->filter(function($i){
            
            $tags = collect($i->tags);

            if ($tags->has('allow_variations')) {
                return $i;
            }
            
        })->values(); 

        return $this;
    }
}


