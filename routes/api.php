<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('callbacks', 'MeliNotificationsController@web_hooks');
Route::post('mercadopago_callback','Web\CartController@mercadopago_callback');

Route::group(['namespace' => 'App'], function () {
    Route::get('get_ivas', 'IvaController@index');
    Route::get('get_moneys', 'MoneyController@index');
});
Route::group(['prefix' => 'iva'], function () {
    Route::get('index', 'Api\IvaComprasController@index');
    Route::post('comprobantes', 'Api\IvaComprasController@comprobantes');
    Route::post('alicuotas', 'Api\IvaComprasController@alicuotas');
    Route::post('to_excel', 'Api\IvaComprasController@to_excel');
});
Route::group(['middleware' => ['auth:api']], function () {
    
    Route::group(['prefix' => 'publication'], function () {

        Route::get('index','Api\PublicationController@index');
        Route::post('publish','Api\PublicationController@publish');
        Route::post('add_variation','Api\PublicationController@add_variation');
        Route::put('modify_quantity','Api\PublicationController@modify_quantity');
        Route::put('update_available_quantity','Api\PublicationController@update_available_quantity');
        Route::put('update_price','Api\PublicationController@update_price');
        Route::get('publications_total','Api\PublicationController@publications_total');
        Route::get('get_publications_id','Api\PublicationController@get_publications_id');
        
    });

    Route::group(['prefix' => 'products'], function () {
        
        Route::post('fetchlistingtypes','Api\ProductController@fetchlistingtypes');
        Route::post('fetchattributes','Api\ProductController@fetchattributes');
        Route::post('upload/image','Api\ProductController@upload_image');
        Route::post('store','Api\ProductController@store');
        Route::post('index','Api\ProductController@index');
        Route::get('update_ok','Api\ProductController@update_ok');
        Route::post('iva_update','Api\ProductController@iva_update');
        Route::post('find_by_name','Api\ProductController@findProductByName');
        Route::post('find_by_id','Api\ProductController@findById');
        Route::post('delete_picture','Api\ProductController@delete_picture');
        Route::post('update','Api\ProductController@update');
       
    });

    Route::group(['prefix' => 'suppliers'], function () {

        Route::post('index','Api\SupplierController@index');
        Route::post('brands','Api\SupplierController@brands');
        
    });

    Route::group(['prefix' => 'categories'], function () {

        Route::post('fetch_main_categories','Api\CategoriesController@fetch_main_categories');
        Route::post('fetch_children_categories','Api\CategoriesController@fetch_children_categories');
        Route::post('store','Api\CategoriesController@store');
        Route::post('parent','Api\CategoriesController@parent');
        Route::post('child','Api\CategoriesController@child');
        Route::post('index','Api\CategoriesController@index');
        Route::post('set_status','Api\CategoriesController@set_status');
        
    });

    Route::group(['prefix' => 'variations'], function () {

        Route::post('store', 'Api\VariationController@store');

    });

    Route::group(['prefix' => 'colours'], function () {

        Route::get('get_colours', 'Api\ColourController@index');
    });
    
        
    Route::group(['prefix' => 'mercadolibre'], function () {

        Route::get('publication_ids', 'Api\MercadoLibre\PublicationController@index');
        Route::get('publication_headers', 'Api\MercadoLibre\PublicationController@publication_headers');
        Route::put('change_publication_status', 'Api\MercadoLibre\PublicationController@change_status');
        Route::put('avalilable_quantity_change', 'Api\MercadoLibre\PublicationController@avalilable_quantity_change');
        Route::put('update_available_quantity_on_publication', 'Api\MercadoLibre\PublicationController@update_available_quantity_on_publication');
        Route::put('update_available_quantity_on_variation', 'Api\MercadoLibre\PublicationController@update_available_quantity_on_variation');
        Route::put('update_price_on_publication', 'Api\MercadoLibre\PublicationController@update_price_on_publication');
        Route::put('update_price_on_variation', 'Api\MercadoLibre\PublicationController@update_price_on_variation');
        Route::post('syncro', 'Api\MercadoLibre\PublicationController@syncro');
        Route::post('get_products_id', 'Api\MercadoLibre\PublicationController@get_products_id');
        Route::post('save_product_by_id', 'Api\MercadoLibre\PublicationController@save_product_by_id');
        Route::get('orders_by_seller_recent', 'Api\MeliNotificationController@orders_by_seller_recent');
        Route::post('answer_question', 'Api\MercadoLibre\MeliQuestionController@answer_question');
        Route::get('visits_by_publication', 'Api\MercadoLibre\PublicationController@visits_by_publication');
        Route::get('visits_by_publication_between_dates', 'Api\MercadoLibre\PublicationController@visits_by_publication_between_dates');
        Route::post('publish_message', 'Api\MercadoLibre\MessageController@publish_message');

    });

    Route::group(['prefix' => 'notifications'], function () {
        
        Route::get('myfeeds', 'Api\MeliNotificationController@myfeeds');

    });

    Route::group(['prefix' => 'orders'], function () {
        
        Route::post('getorders', 'Api\MeliNotificationController@orders_by_seller');
        Route::post('get_all_orders', 'Api\MeliNotificationController@get_all_orders');
        Route::post('order', 'Api\MeliNotificationController@order');
        Route::post('pedidos_clientes_from_meli', 'Api\MeliNotificationController@pedidos_clientes_from_meli');
        Route::post('save_order_from_meli', 'Api\MeliNotificationController@save_order_from_meli');
        Route::post('get_billing_info', 'Api\MeliNotificationController@get_billing_info');

    });

    Route::group(['prefix' => 'pedidos'], function () {

        Route::get('getpedidos', 'Api\OrdersController@index');
        Route::post('bill', 'Api\OrdersController@bill');
    });

    Route::group(['prefix' => 'vouchers'], function () {

        Route::get('index', 'Api\VoucherController@index');
    });
    
    Route::group(['prefix' => 'afip'], function () {
        
        Route::post('get_persona', 'Api\Afip\WSPUCController@getPersona');

        Route::group(['prefix' => 'comprobantes'], function () {
        
            Route::post('ultimo_autorizado', 'Api\Afip\WSFEController@ultimo_autorizado');
            Route::post('generate', 'Api\Afip\WSFEController@generate');
            Route::post('tipo_tributos', 'Api\Afip\WSFEController@tipoTributos');
        });
    });

    Route::group(['prefix' => 'arba'], function () {
        
        Route::post('alicuota_por_sujeto', 'Api\Arba\ArbaController@alicuota_por_sujeto');
    });


    Route::group(['prefix' => 'company'], function () {
        
        Route::post('store', 'Admin\CompanyController@store');
        Route::post('update', 'Admin\CompanyController@update');
        Route::get('show', 'Admin\CompanyController@show');
        Route::post('logo_base_64', 'Admin\CompanyController@logo_base_64');
        Route::post('upload_logo', 'Admin\CompanyController@upload_logo');
        
        Route::group(['prefix' => 'user'], function () {
            Route::get('index', 'Admin\AdminController@index');
            Route::put('rol/update', 'Api\UserController@rol_update');
            Route::put('active', 'Api\UserController@active');
            
            
        });

        Route::group(['prefix' => 'rol'], function () {
            Route::get('index', 'Admin\RolController@index');
        });

    });

    Route::group(['prefix' => 'customer'], function () {
        
        Route::post('exist_customer', 'Api\CustomerController@exist_customer');
        Route::post('store', 'Api\CustomerController@store');
        Route::post('store_from_form', 'Api\CustomerController@store_from_form');
        Route::post('address_update', 'Api\CustomerController@address_update');
        Route::post('search_customer', 'Api\CustomerController@search_customer');
        Route::get('index', 'Api\CustomerController@index');
        Route::post('show', 'Api\CustomerController@show');
        Route::put('update', 'Api\CustomerController@update');
        Route::put('update_from_modal', 'Api\CustomerController@update_from_modal');
        Route::put('customer_update_data_from_billing_info', 'Api\CustomerController@customer_update_data_from_billing_info');
        
    });

    Route::group(['prefix' => 'customer'], function () {
        
        Route::get('type', 'Api\CustomerTypeController@index');
        
    });

    Route::group(['prefix' => 'pedido_cliente'], function () {

        Route::get('index', 'Api\PedidoClienteController@index');
        Route::post('store', 'Api\PedidoClienteController@store');
        Route::put('delete', 'Api\PedidoClienteController@delete');
        Route::put('status_update', 'Api\PedidoClienteController@status_update');
        Route::post('show', 'Api\PedidoClienteController@show');
        Route::post('save_comment', 'Api\PedidoClienteController@save_comment');
        Route::put('update_delivery_date', 'Api\PedidoClienteController@update_delivery_date');
        Route::post('save_fiscal_address', 'Api\PedidoClienteController@save_fiscal_address');
        Route::post('remove_fiscal_address', 'Api\PedidoClienteController@remove_fiscal_address');
        Route::post('save_delivery_address', 'Api\PedidoClienteController@save_delivery_address');
        Route::post('remove_delivery_address', 'Api\PedidoClienteController@remove_delivery_address');
        
    });

    Route::group(['prefix' => 'sale_invoice'], function () {
        
        Route::post('store', 'Api\SaleInvoiceController@store');
        Route::post('by_customer', 'Api\SaleInvoiceController@byCustomer');
        Route::post('by_customer_with_debt', 'Api\SaleInvoiceController@byCustomerWithDebt');
        Route::post('index', 'Api\SaleInvoiceController@index');
        Route::put('is_searching', 'Api\SaleInvoiceController@isSearching');

    });

    Route::group(['prefix' => 'price_list'], function () {
        
        Route::post('getPriceListsOfAProduct', 'Api\PriceListsController@getPriceListsOfAProduct');
        Route::post('updatePriceProductOnPriceList', 'Api\PriceListsController@updatePriceProductOnPriceList');
        Route::post('enablePriceLists', 'Api\PriceListsController@enablePriceList');
        Route::post('store', 'Api\PriceListsController@store');
        Route::post('index', 'Api\PriceListsController@index');
        Route::post('update_benefit', 'Api\PriceListsController@update_benefit');
        
    });

    Route::group(['prefix' => 'address_type'], function () {
        
        Route::get('index', 'Api\AddressTypeController@index');
    });

    Route::group(['prefix' => 'localidades'], function () {
        
        Route::post('find_by_name', 'Api\LocalidadController@find_by_name');
    });

    Route::group(['prefix' => 'address'], function () {
        
        Route::post('store', 'Api\AddressController@store');
        Route::put('update', 'Api\AddressController@update');
    });

    Route::group(['prefix' => 'bank'], function () {
        Route::get('index', 'Api\BankController@index');
        Route::post('find_by_name', 'Api\BankController@findBankByName');
    });

    Route::group(['prefix' => 'receipt'], function () {
        
        Route::get('index', 'Api\ReceiptController@index');
        Route::post('store', 'Api\ReceiptController@store');
    });

    Route::group(['prefix' => 'measure_unity'], function () {
        Route::get('index', 'Api\MeasurementUnitController@index');
    });

    Route::group(['prefix' => 'article'], function () {
        Route::get('index', 'Api\ArticleController@index');
        Route::post('find_article_by_name', 'Api\ArticleController@find_article_by_name');
        Route::post('store', 'Api\ArticleController@store');
    });

    Route::group(['prefix' => 'accounting_account'], function () {
        Route::get('index', 'Api\AccountingAccountController@index');
        Route::post('son_provider', 'Api\AccountingAccountController@son_provider');
    });

    Route::group(['prefix' => 'taxes'], function () {
        Route::get('index', 'Api\TaxController@index');
        Route::post('store', 'Api\TaxController@store');
        Route::post('set_accounting_account', 'Api\TaxController@set_accounting_account');
        Route::post('set_type', 'Api\TaxController@set_type');
        Route::post('set_state', 'Api\TaxController@set_state');
        Route::post('active', 'Api\TaxController@active');
    });

    Route::group(['prefix' => 'tax_types'], function () {
        Route::get('index', 'Api\TaxTypeController@index');
    });

    Route::group(['prefix' => 'inscription'], function () {
        Route::get('index', 'Api\InscriptionController@index');
    });

    Route::group(['prefix' => 'purchase_document'], function () {
        Route::get('index', 'Api\PurchaseDocumentController@index');
    });

    Route::group(['prefix' => 'providers_regimen'], function () {
        Route::get('index', 'Api\RegimenController@index');
    });

    Route::group(['prefix' => 'provider'], function () {
        Route::post('store', 'Api\ProviderController@store');
        Route::post('find_by_name', 'Api\ProviderController@find_by_name');
        Route::post('receipt/index', 'Api\ReceiptPaymentToProvidersController@index');
        Route::post('receipt/store', 'Api\ReceiptPaymentToProvidersController@store');
        Route::get('receipt/list', 'Api\ReceiptPaymentToProvidersController@list');
    });

    Route::group(['prefix' => 'purchase_invoice'], function () {
        Route::get('index', 'Api\PurchaseInvoiceController@index');
        Route::post('store', 'Api\PurchaseInvoiceController@store');
    });

    Route::group(['prefix' => 'publication_list'], function () {
        Route::get('index', 'Api\MercadoLibre\PublicationListController@index');
    });

    Route::group(['prefix' => 'order_payment'], function () {
        Route::get('index', 'Api\OrderPaymentController@index');
        Route::post('store', 'Api\OrderPaymentController@store');
        Route::put('delete', 'Api\OrderPaymentController@delete');
    });

    Route::group(['prefix' => 'pay_methods'], function () {
        Route::get('index', 'Api\PaymentTypeController@index');
    });

    Route::group(['prefix' => 'commissions'], function () {
        Route::get('my', 'Api\UserController@my_commissions');
    });
    

});
Route::group(['prefix' => 'auth'], function () {
    //Route::post('login', 'Auth\AuthController@login');
    Route::post('signup', 'Auth\AuthController@signup');
    Route::get('signup/activate/{token}', 'Auth\AuthController@signupActivate');
    
    Route::group(['middleware' => ['auth:api']], function() {
       /*  Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user'); */
    });

    Route::get('users/{id}', function ($id) {
        
    });
});