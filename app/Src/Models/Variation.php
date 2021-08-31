<?php

namespace App\Src\Models;

use App\Src\Models\Stock;
use App\Src\Models\Picture;
use App\Src\Models\Product;
use OwenIt\Auditing\Auditable as Audi;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Variation extends Model implements HasMedia, Auditable
{
    use Audi, HasMediaTrait;

    protected $guarded =[];
    
    protected $casts = [
        'attribute_combinations' => 'array',
        'attributes' => 'array',
    ];

    /**
     * RELACIONES
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }


    /**
     * FUNCIONES
     */
    public function is_now_published_meli()
    {
        $this->published_meli = 1;

        $this->save();
    }


    public function is_now_published_here()
    {
        $this->published_here = 1;

        $this->save();
    }

    public function is_published_meli()
    {

        if ($this->published_meli) {
            return true;
        }

        return false;
    }

    public function is_published_here()
    {

        if ($this->published_here) {
            return true;
        }

        return false;
    }

    public function update_meli_stock($quantity)
    {
        $this->stock()->update(['available_quantity_meli' => $quantity]);

        $this->stock->refresh();

    }

    public function update_total_stock($quantity)
    {
        $this->stock()->update(['total_stock' => $quantity]);

        $this->stock->refresh();

    }

    public function add_meli_id($response)
    {
        $publication = collect($response['body']);
        $pub = $publication->toArray();

        if ($publication->has('variations')) {
            $this->meli_id = $pub['variations'][0]->id;
        }else{

            $this->meli_id = $publication->last()->id;
        }

        $this->save();
    }

    public function save_associated_images($files)
    {
        
        $this->addMedia('image')->toMediaCollection('variations');

        return $this;
    }

    public function get_pics()
    {
        if($this->getMedia('variations')->isEmpty()){
            return $this->pictures->first()->secure_url;
        }else{
            return $this->getMedia('variations')->first()->getFullUrl();
        }
    }

}


