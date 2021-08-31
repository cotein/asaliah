<?php
use App\User;
use App\Src\Arba\Arba;
use GuzzleHttp\Client;
use App\Src\Models\City;
use App\Src\Models\Order;
use App\Src\Models\Status;
use App\Src\Meli\MeliUsers;
use App\Src\Models\Address;
use App\Src\Models\Company;
use App\Src\Models\Product;
use App\Src\Models\Receipt;
use App\Src\Models\Voucher;
use App\Src\Models\WebHook;
use App\Src\SyncroProducts;
use App\Src\Meli\MeliHealth;
use App\Src\Meli\MeliOrders;
use App\Src\Meli\MeliVisits;
use App\Src\Models\Category;
use App\Src\Models\Customer;
use App\Src\Models\Provider;
use App\Src\Models\Supplier;

use App\Src\Models\PriceListProduct;

use App\Src\Meli\MeliBilling;
use App\Src\Meli\MeliMessage;
use App\Src\Meli\MeliReviews;
use App\Src\Models\PriceList;
use App\Src\Models\Variation;
use App\Src\Meli\MeliPictures;
use Spatie\MediaLibrary\Media;
use App\Src\Meli\MeliProductos;
use App\Src\Meli\MeliQuestions;
use App\Src\Models\Publication;
use App\Src\Models\SaleInvoice;
use App\Src\Tools\StdClassTool;
use App\Src\Geo\GeoLocalization;
use App\Src\Meli\MeliCategories;
use App\Src\Meli\MeliHandleData;
use App\Src\Models\PedidoCliente;
use App\Src\Afip\WS\Source\WSBase;
use App\Src\Afip\WS\Source\WSFEV1;
use App\Src\Meli\MeliDescriptions;
use App\Src\Meli\MeliPublications;
use App\Src\MercadoPago\MPPayment;
use Illuminate\Support\Facades\DB;
use App\Src\Afip\WS\Source\WSPUC04;
use App\Src\Afip\WS\Source\WSPUC05;
use App\Src\Afip\WS\Source\WSPUC13;
use App\Src\Meli\MeliNotifications;
use App\Src\Models\PurchaseInvoice;
use App\Src\Models\WebHookMessages;
use App\Src\Models\WebHookQuestion;
use App\Src\Afip\WS\Source\WSFECRED;
use App\Src\Categories\CategoryBase;
use App\Src\Unsplash\SearchUnSplash;
use Illuminate\Support\Facades\Auth;
use App\Src\DataBase\CheckConnection;
use App\Src\Models\ReceiptCancelation;
use App\Src\Tests\VariationsMyOwnTest;
use Illuminate\Support\Facades\Schema;
use App\Events\WebHookOrderWasReceived;
use App\Src\Models\PedidoClienteStatus;
use App\Src\Traits\GenerateFilterTrait;
use Spatie\Activitylog\Models\Activity;
use Kolovious\MeliSocialite\Facade\Meli;
use App\Events\WebHookMessageWasReceived;
use App\Src\Afip\WS\Source\WSFEV1Manager;
use App\Src\Afip\WS\Source\WSPUCResponse;
use MahdiMajidzadeh\LaravelUnsplash\Photo;
use MahdiMajidzadeh\LaravelUnsplash\Search;
use App\Src\Models\ReceiptPaymentToProvider;
use App\Listeners\CreateProductByPublication;
use App\Transformers\Afip\InvoiceTransformer;
use App\Transformers\Company\CompanyTransformer;
use App\Transformers\Meli\WebHookMessageTransformer;
use App\Http\Controllers\Api\MeliNotificationController;
use App\Transformers\PedidoCliente\PedidoClienteListTransformer;
use App\Transformers\PublicationHere\NestableCategoryTransformer;
use App\Transformers\PurchaseInvoice\IvaComprasAlicuotasTransformer;
use App\Transformers\PurchaseInvoice\IvaComprasComprobantesTransformer;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {

    return view('app.mercadolibre.messages.messenger')->with(['view_name' => 'aaaaaaaaaaaaaaaaaaaaaaa']);;
    
});

Route::get('pp', function () {

    $p = Product::find(25);
    $p = PriceListProduct::where('product_id', 25)->get();
    dd($p[0]);
    $tables = \DB::select('SHOW TABLES');
    $r = [];
    foreach($tables as $table){
        array_push($r, $table->Tables_in_asaliah);
        \Artisan::call('iseed', [
            'tables' => $table->Tables_in_asaliah,
            '--force' => true,
        ]);
    }
    $t = implode(",", $r);
    
    print_r($t);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');    

    /** PRODUCTS */
    Route::group(['prefix' => 'productos', 'middleware' => ['meli']], function () {
        Route::get('nuevo', 'App\ProductController@create')->name('product.create');
        Route::get('precio', 'App\ProductController@price')->name('product.price');
    });

    /** PUBLICATIONS */
    Route::group(['prefix' => 'publicacion', 'middleware' => ['meli']], function () {
        Route::get('nueva', 'App\PublicationController@create')->name('publication.create');
    });

    /** VARIATIONS */
    Route::group(['prefix' => 'variacion', 'middleware' => ['meli']], function () {
        Route::get('nueva', 'App\VariationController@create')->name('variation.create');
    });

    /** MERCADO LIBRE */
    Route::group(['prefix' => 'mercadolibre', 'middleware' => ['meli']], function () {
        Route::get('listado', 'App\MercadoLibreController@list')->name('meli.list');
        Route::get('editar/{meli_id}', 'App\MercadoLibreController@edit')->name('meli.edit');
        Route::get('sincronizar/cuenta', 'App\MercadoLibreController@syncro')->name('meli.syncro');
    });

    /** MERCADOPAGO */
    Route::group(['prefix' => 'mercadopago', 'middleware' => ['meli']], function () {
        Route::get('listado', 'App\MercadoPagoController@mercadopago_payments')->name('mercadopago.list');    
    });

    /** PEDIDOS */
    Route::group(['prefix' => 'pedidos', 'middleware' => ['meli']], function () {
        Route::get('listado', 'App\OrdersController@pedidos');    
    });

    Route::group(['prefix' => 'ordenes'], function () {
        
        Route::get('/listado', 'App\MeliNotificationController@list')->name('notifications.list');
        Route::get('/orden', 'App\MeliNotificationController@show')->name('order.show');

    });
    /** PEDIDOS CLIENTES */
    Route::group(['prefix' => 'pedidos/clientes'], function () {
        
        Route::get('/nuevo', 'App\PedidoClienteController@create');
        Route::get('/edicion/{code}', 'App\PedidoClienteController@edit');
        Route::get('/listado', 'App\PedidoClienteController@list');
        Route::get('/comanda', 'App\PedidoClienteController@comanda');

    });
    
    Route::group(['prefix' => 'clientes'], function () {
        Route::get('listado', 'App\CustomerController@customer_list');       
        Route::get('generar/comprobantes', 'App\CustomerController@generate_voucher')->middleware('afip-data');
        Route::get('listado/comprobantes', 'App\CustomerController@invoices_list')->middleware('afip-data');
        Route::get('edicion/{id}', 'App\CustomerController@edit');
        Route::get('generar/recibo', 'App\CustomerController@generate_recibo');
        Route::get('/recibo/listado', 'App\ReceiptCustomerController@list');
        Route::get('/nuevo', 'App\CustomerController@create');
    });
    /**COMPRAS */
    Route::group(['prefix' => 'proveedores'], function () {
        Route::get('/comprobantes/ingreso', 'App\PurchaserInvoiceController@create');
        Route::get('/comprobantes/pagar', 'App\PurchaserInvoiceController@to_pay');
        Route::get('/comprobantes/listado', 'App\ProviderController@list');
        Route::get('/nuevo', 'App\ProviderController@create');
        Route::get('/ordenes/listado', 'App\OrderPaymentController@list');
        Route::get('/recibos/nuevo', 'App\ReceiptPaymentToProvidersController@create');
        Route::get('/recibos/listado', 'App\ReceiptPaymentToProvidersController@list');
    });

    /** ARBA */
    Route::group(['prefix' => 'arba'], function () {
        Route::get('/alicuota-por-sujeto', 'App\ArbaController@create')->middleware('afip-data');
    });

    /** COMMISSIONS */
    Route::group(['prefix' => 'comisiones'], function () {
        Route::get('/listado', 'App\UserController@list');
    });

});

/** Auth Routes */
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/** MELI Routes */
Route::get('/meli', 'Auth\AuthMeliController@authorization');
Route::get('/meli/callback', 'Auth\AuthMeliController@handleProviderCallback');

Route::post('/meli/create_test_user', 'Web\WebController@create_test_user');


//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/prueba', 'Web\WebController@prueba')->name('prueba');
Route::get('/', 'Web\WebController@root')->name('root');
Route::get('/productos', 'Web\WebController@listing_products')->name('listing.products');
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');


/** Rutas WEB */
Route::post('mercadopago_callback', 'Web\WebController@mercadopago_callback');    


/** PRODUCTS */
Route::post('get_products', 'Web\ProductController@index');
Route::post('products_by_category', 'Web\ProductController@by_category');
Route::post('search_products', 'Web\ProductController@search_products');

/** PUBLICATIONS  */
Route::post('/publications', 'Web\PublicationController@index');
Route::get('/categorias/{slug}', 'Web\PublicationController@by_category');

/** CATEGORIES */
Route::post('get_categories', 'Web\CategoryController@index');
Route::get('/tienda', 'Web\WebController@shop')->name('init');
Route::get('/producto/{product_slug}/{id}', 'Web\WebController@product');

/** NEWSLETTER */
Route::post('/email/store', 'Web\NewsLetterController@store');

/** BRANDS */
Route::get('/brands', 'Web\BrandController@index');

/** CART */
Route::get('/carro_de_compras', 'Web\CartController@cart_details');
Route::get('/respuesta_de_compra', 'Web\CartController@sales_process_response')->name('sales.response');

/** PROVINCES */
Route::get('/provinces', 'Web\ProvinceController@index');

/** CITIES */
Route::post('/cities', 'Web\CityController@get_cities_per_province');
Route::post('/shipping', 'Web\CityController@shipping');

/** AFIP */
Route::group(['prefix' => 'afip'], function () {
    
    Route::get('mis-datos', 'App\AfipController@afip_data');
});

/** COMPANY */
Route::group(['prefix' => 'empresa'], function () {
    Route::get('datos', 'App\CompanyController@company_data');
    Route::get('activar-usuario', 'App\AdminController@activate_user');
    Route::get('impuestos', 'App\AdminController@taxes');
    Route::get('productos/ingreso', 'App\AdminController@products');
    Route::get('productos/listado', 'App\ProductController@list');
    Route::get('productos/edicion/{id}', 'App\ProductController@edit');
    Route::get('ultimo/comprobante', 'App\AdminController@last_voucher_on_afip');
    Route::get('categorias/nueva', 'App\CategoryController@new');
    Route::get('categorias/listado', 'App\CategoryController@list');
    Route::get('lista-precios/nueva', 'App\AdminController@priceList');
});

Route::group(['prefix' => 'error'], function () {
    Route::get('401', 'ErrorController@error_401')->name('401');
});

/* Route::group(['prefix' => 'meli'], function () {
    Route::get('notifications', 'MeliNotificationsController@www');
}); */

