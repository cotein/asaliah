<?php

namespace App\Listeners;

use App\Src\Models\DailyMovement;
use App\Src\Traits\ZeroLeftTrait;
use Illuminate\Support\Facades\DB;
use App\Src\Traits\DateFormatTrait;
use App\Events\PurchaseInvoiceSaved;
use App\Src\Models\DailyMovementItems;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DailyMovementGenerateListener
{
    use DateFormatTrait, ZeroLeftTrait;
    
    const ACTIVO = 1;

    const IVA21 = ['ID'=>6, 'DESCRIPTION'=>'CR. FISCAL IVA 21%', 'AA_ID'=>21];
    const IVA105 = ['ID'=>5, 'DESCRIPTION'=>'CR. FISCAL IVA 10,5%', 'AA_ID'=>22];
    const IVA27 = ['ID'=>7, 'DESCRIPTION'=>'CR. FISCAL IVA 27%', 'AA_ID'=>25];
    const GRAVADO = 8;
    const IVA5 = ['ID'=>9, 'DESCRIPTION'=>'CR. FISCAL IVA 5%', 'AA_ID'=>27];
    const IVA25 = ['ID'=>10, 'DESCRIPTION'=>'CR. FISCAL IVA 2,5%', 'AA_ID'=>28];
    const IVA0 = 4;
    const EXENTO = 3;
    const NO_GRAVADO = 2;
    const NO_CORRESPONDE = 1;

    const HABER_ZERO = 0;

    public function handle(PurchaseInvoiceSaved $event)
    {
        try {
            
            DB::beginTransaction();
            
            $pi = $event->pi;

            $dm = new DailyMovement;
            $dm->number = $dm->number();
            $dm->accounting_year_id = 1;
            $dm->status_id = self::ACTIVO;
            $dm->save();
            $dm->refresh();

            $pi->items->map(function($i) use($pi, $dm){

                $dm_item = new DailyMovementItems;
                $dm_item->daily_movement_id = $dm->id;
                $dm_item->number = $dm_item->number($dm->id);
                $dm_item->date = $this->now();
                $dm_item->name = $pi->provider->name . ' ' . 
                                $pi->voucher->name . ' ' . 
                                $this->zeroleft($pi->ptovta, 4) .'-'. $this->zeroleft($pi->number, 8) .' '.
                                $i->article->name;
                $dm_item->accounting_account_id = $i->article->accounting_account_id;
                $dm_item->debe = $i->quantity * $i->unit_price;
                $dm_item->haber = self::HABER_ZERO;
                $dm_item->save();
                $dm_item->refresh();
                
                $dm_item = new DailyMovementItems;
                $dm_item->daily_movement_id = $dm->id;
                $dm_item->number = $dm_item->number($dm->id);
                $dm_item->date = $this->now();

                switch ($i->iva->id) {

                    case self::IVA21['ID'] :
                        $dm_item->name = $pi->voucher->name . ' ' . 
                            $this->zeroleft($pi->ptovta, 4) .'-'. 
                            $this->zeroleft($pi->number, 8) .' '. self::IVA21['DESCRIPTION'];
                        $dm_item->accounting_account_id = self::IVA21['AA_ID'];
                        break;

                    case self::IVA105['ID'] :
                        $dm_item->name = $pi->voucher->name . ' ' . 
                            $this->zeroleft($pi->ptovta, 4) .'-'. 
                            $this->zeroleft($pi->number, 8) .' '. self::IVA105['DESCRIPTION'];
                        $dm_item->accounting_account_id = self::IVA105['AA_ID'];
                        break;

                    case self::IVA27['ID'] :
                        $dm_item->name = $pi->voucher->name . ' ' . 
                            $this->zeroleft($pi->ptovta, 4) .'-'. 
                            $this->zeroleft($pi->number, 8) .' '. self::IVA27['DESCRIPTION'];
                        $dm_item->accounting_account_id = self::IVA27['AA_ID'];
                        break;

                    case self::IVA5['ID'] :
                        $dm_item->name = $pi->voucher->name . ' ' . 
                            $this->zeroleft($pi->ptovta, 4) .'-'. 
                            $this->zeroleft($pi->number, 8) .' '. self::IVA5['DESCRIPTION'];
                        $dm_item->accounting_account_id = self::IVA5['AA_ID'];
                        break;

                    case self::IVA25['ID'] :
                        $dm_item->name = $pi->voucher->name . ' ' . 
                            $this->zeroleft($pi->ptovta, 4) .'-'. 
                            $this->zeroleft($pi->number, 8) .' '. self::IVA25['DESCRIPTION'];
                        $dm_item->accounting_account_id = self::IVA25['AA_ID'];
                        break;
                    
                }

                $dm_item->debe = $i->iva_import;
                $dm_item->haber = self::HABER_ZERO;
                $dm_item->save();
                $dm_item->refresh();
            });

            $pi->taxes->map(function($t) use($pi, $dm) {

                if ($t->tax_import > 0) {
                    $dm_item = new DailyMovementItems;
                    $dm_item->daily_movement_id = $dm->id;
                    $dm_item->number = $dm_item->number($dm->id);
                    $dm_item->date = $this->now();
                    $dm_item->name = $pi->provider->name . ' ' . 
                                    $pi->voucher->name . ' ' . 
                                    $this->zeroleft($pi->ptovta, 4) .'-'. $this->zeroleft($pi->number, 8) .' '.
                                    $t->tax->name;
                    $dm_item->accounting_account_id = $t->tax->accounting_account_id;
                    $dm_item->debe = $t->tax_import;
                    $dm_item->haber = self::HABER_ZERO;
                    $dm_item->save();
                    $dm_item->refresh();
                }
            });

            DB::commit();

        } catch (\Throwable $th) {
            
            activity('Movimiento diario')
                ->performedOn($dm)
                ->causedBy(auth()->user()->id)
                ->withProperties(['PurchaseInvoice' => 
                    $pi->provider->name . ' ' . 
                    $pi->voucher->name . ' ' . 
                    $this->zeroleft($pi->ptovta, 4) .'-'. $this->zeroleft($pi->number, 8)])
                ->log('Facturas Compras | No se generó el movimiento del libro diario');
            
            DB::rollback();
        }
        
    }
}
