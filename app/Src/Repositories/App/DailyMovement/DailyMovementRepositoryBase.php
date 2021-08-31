<?php

namespace App\Src\Repositories\App\DailyMovement;

use App\Src\Models\Status;
use App\Src\Models\DailyMovement;
use App\Src\Traits\ZeroLeftTrait;

abstract class DailyMovementRepositoryBase
{
    use ZeroLeftTrait;
    
    protected $purchase_invoice;

    public function __construct($purchase_invoice)
    {
        $this->purchase_invoice = $purchase_invoice;
    }

    public abstract function daily_movement_items_debe($daily_movement, $data);
    public abstract function daily_movement_items_haber($daily_movement, $data);
    
    public function daily_movement()
    {
        $accounting_year = 1;

        $daily_movement = new DailyMovement;
        $daily_movement->number =1;
        $daily_movement->accounting_year_id = $accounting_year;
        $daily_movement->status_id = Status::ACTIVO;

        $daily_movement->save();
        $daily_movement->refresh();

        return $daily_movement;
    }
}
