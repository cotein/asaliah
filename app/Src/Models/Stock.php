<?php

namespace App\Src\Models;

use App\Src\Models\Variation;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Stock extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $guarded =[];

    protected $auditExclude = [];

    
    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }

    /**
     * Métodos
     */

    public function update_total_stock($quantity)
    {
        $this->total_stock = $quantity;

        $this->save();
    }

    public function update_available_quantity_meli($quantity)
    {
        $this->available_quantity_meli += $quantity;

        $this->save();
    }

    public function update_available_quantity_here($quantity)
    {
        $this->available_quantity_here += $quantity;

        $this->save();
    }

    public function update_published_meli_history($quantity)
    {
        $this->published_meli_history += $quantity;

        $this->save();
    }   
    
}
