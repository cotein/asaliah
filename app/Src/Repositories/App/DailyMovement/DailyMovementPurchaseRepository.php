<?php

namespace App\Src\Repositories\App\DailyMovement;

use App\Src\Models\Status;
use App\Src\Models\DailyMovement;
use App\Src\Traits\DateFormatTrait;
use App\Src\Models\DailyMovementItems;
use App\Src\Contracts\AccountingAccountIva;
use App\Src\Repositories\App\DailyMovement\DailyMovementRepositoryBase;



class DailyMovementPurchaseRepository extends DailyMovementRepositoryBase implements AccountingAccountIva
{
    use DateFormatTrait;

    public function __construct($purchase_invoice)
    {
        parent::__construct($purchase_invoice);
    }
    
    public function accounting_account_iva($iva_id)
    {
        /**
         * retorna el id de la cuenta contable
         */
        switch ($iva_id) {
            case '6':
                return 21;
                break;
            case '5':
                return 22;
                break;
            case '7':
                return 25;
                break;
            case '9':
                return 27;
                break;
            case '10':
                return 28;
                break;
        }
    }

    public function daily_movement_items_debe($daily_movement, $data)
    {

        collect($data)->map(function($i){
            $daily_item = new DailyMovementItems;
            
            $daily_item->daily_movement_id = $daily_movement->id;
            $daily_item->number = 1;
            $daily_item->date = $this->now();
            $daily_item->name = $i{'name'};
            $daily_item->accounting_account_id = $i{'accounting_account_id'};
            $daily_item->debe = $i{'debe'};

            $daily_item->save();
        });
    }

    public function daily_movement_items_haber($daily_movement, $data)
    {
        $accounting_account_proveedores_id = 52;

        $daily_item = new DailyMovementItems;
        
        $daily_item->daily_movement_id = $daily_movement->id;
        $daily_item->number = 1;
        $daily_item->date = $this->now();
        $daily_item->name = 'PROVEEDORES';
        $daily_item->accounting_account_id = $accounting_account_proveedores_id;
        $daily_item->debe = $data;

        $daily_item->save();
    }

    public function prepare_data()
    {
        //$invoice = $this->purchase_invoice['invoice'];
        $data = collect([]);

        collect($this->purchase_invoice->items)->map(function($article) use($data) {
            $data->push(
                [
                    'name' => $this->purchase_invoice['invoice']['provider']['name'] . ' - ' . $this->purchase_invoice['invoice']['type']['name'] . ' - ' . $this->zeroleft($this->purchase_invoice['invoice']['subsidiary'],4) .'-'. $this->zeroleft($this->purchase_invoice['invoice']['number'],8),
                    'accounting_account_id' => $article['accounting_account_id'],
                    'debe' => $article['neto_import']
                ]
            );
        });

        collect($this->purchase_invoice->items)->map(function($article) use($data) {
            $data->push(
                [
                    'name' => $this->purchase_invoice['invoice']['provider']['name'] . ' - ' . $this->purchase_invoice['invoice']['type']['name'] . ' - ' . $this->zeroleft($this->purchase_invoice['invoice']['subsidiary'],4) .'-'. $this->zeroleft($this->purchase_invoice['invoice']['number'],8),
                    'accounting_account_id' => $this->accounting_account_iva($article['iva_id']),
                    'debe' => $article['iva_import']
                ]
            );
        });

        return $data->toArray();
    }
}
