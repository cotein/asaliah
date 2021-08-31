<?php

namespace App\Src\Models;

use App\Src\Models\Product;
use App\Src\Models\WebHookQuestion;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Activitylog\Traits\LogsActivity;

class Publication extends Model implements Auditable
{
    use LogsActivity;

    use \OwenIt\Auditing\Auditable;

    protected static $logName = 'Publication';

    protected $guarded =[];
    
    protected $casts = [
        'sale_terms' => 'array',
        'pictures' => 'array',
        'video_id' => 'array',
        'descriptions' => 'array',
        'non_mercado_pago_payment_methods' => 'array', 
        'shipping' => 'array',
        'seller_address' => 'array',
        'seller_contact' => 'array',
        'location' => 'array',
        'geolocation' => 'array',
        'coverage_areas' => 'array',
        'attributes' => 'array',
        'warnings' => 'array',
        'listing_source' => 'array',
        'variations' => 'array',
        'sub_status' => 'array',
        'tags' => 'array',
        'deal_ids' => 'array',
        'item_relations' => 'array',
    ];

    public function marca()
    {
        return $this->attributes['attributes'];
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'meli_id', 'meli_id');
    }

    public function questions()
    {
        return $this->hasMany(WebHookQuestion::class, 'meli_id', 'meli_id');
    }


    /** MÉTODOS */
    public function get_available_quantity()
    {
        $variations = collect($this->variations);

        if($variations->isEmpty())
        {
            return $this->available_quantity;
        }
        
        return collect($this->variations)->sum('available_quantity');
    }

    public function change_status($status)
    {
        $this->status = $status;

        $this->save();

        return $this;
    }
}
