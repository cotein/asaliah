<?php

namespace App\Console\Commands;

use App\Src\Models\Product;
use Illuminate\Console\Command;

class ProductSearchByText extends Command
{
    protected $text;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:search_by';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera las palabras clave para la búsqueda de productos en los combos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ps = Product::all();

        $ps->map(function($p){

            collect($p->attributes)->map(function($a, $index) use ($p){
                
                $this->text = $this->text . ' ' . $a['value_name'];
            });
            $p->search_by = $this->text . ' ' . $p->name . ' ' . $p->meli_id;
            $p->save();
            $this->text = '';
            $this->info(' FINAL - ' .  $p->id . ' ' . $p->name);
            
        });
    }
}
