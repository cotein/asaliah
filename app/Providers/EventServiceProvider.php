<?php

namespace App\Providers;

use App\Src\Models\Product;
use App\Observers\ProductObserver;
use App\Src\Models\PurchaseInvoice;
use App\Events\NewUserWasRegistered;
use Illuminate\Support\Facades\Event;
use App\Listeners\NewUserWasRegisteredListener;
use App\Src\Repositories\App\DailyMovement\DailyMovementPurchaseRepository;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ProductWasCreated' => [
            'App\Listeners\ProccessPicturesOnMeli',
        ],

        'App\Events\PublicationWasSynchronized' => [
            'App\Listeners\CreateProductByPublication',
        ],

        'App\Events\PriceAndQuantityWasUpdated' => [
            'App\Listeners\PublicationUpdate',
        ],

        'App\Events\AvailableQuantityWasUpdated' => [
            'App\Listeners\UpdateAvailableQuantityOnVariation',
        ],

        'App\Events\PaymentWasCreated' => [
            'App\Listeners\CreateShoppingCart',
        ],

        'App\Events\ShoppingCartWasCreated' => [
            'App\Listeners\CreateOrder',
        ],
        'App\Events\PedidoClienteStatusUpdate' => [
            'App\Listeners\ApplyCommissionToSeller',
        ],

        NewUserWasRegistered::class => [
            NewUserWasRegisteredListener::class
        ],

        'App\Events\PurchaseInvoiceSaved' => [
            'App\Listeners\DailyMovementGenerateListener'
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        /* PurchaseInvoice::created(function($invoice) {
            $daily = new DailyMovementPurchaseRepository($invoice);
            $data = $daily->prepare_data();
            $daily_movement = $daily->daily_movement();
            $daily->daily_movement_items_debe($daily_movement, $data);
            $daily->daily_movement_items_haber($daily_movement, $invoice->total);

        }); */
    }
}
