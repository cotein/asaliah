
require('./bootstrap');

window.Vue = require('vue');

import Transitions from 'vue2-transitions';
Vue.use(Transitions);

import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

import {
	Tabs,
	Tab
} from 'vue-tabs-component';
Vue.component('tabs', Tabs);
Vue.component('tab', Tab);

import ToggleButton from 'vue-js-toggle-button';
Vue.use(ToggleButton);

import VueMomentLib from "vue-moment-lib";
Vue.use(VueMomentLib);

import {
	ClientTable,
	Event
} from 'vue-tables-2';

const VueScrollTo = require('vue-scrollto');
Vue.use(VueScrollTo);

Vue.use(ClientTable, {
	texts: {
		count: "Mostrando {from} a {to} de {count} registros totales|{count} registros|Un registro",
		first: 'Primero',
		last: 'Último',
		filter: "Filtro: ",
		filterPlaceholder: "Buscar",
		limit: "Registros:",
		page: "Página:",
		noResults: "Registros no encontrados",
		filterBy: "Filtrar por {column}",
		loading: 'Cargando...',
		defaultOption: 'Seleccionar {column}',
		columns: 'Columnas'
	},
}, false, 'bootstrap3', 'default');

import VueCurrencyFilter from 'vue-currency-filter';

import BlockUI from 'vue-blockui'
Vue.use(BlockUI)

Vue.use(VueCurrencyFilter, {
	symbol: '$',
	thousandsSeparator: '.',
	fractionCount: 2,
	fractionSeparator: ',',
	symbolPosition: 'front',
	symbolSpacing: true
});

import VTooltip from 'v-tooltip';
Vue.use(VTooltip);

import auth from './mixins/auth';
Vue.mixin(auth);

import sleep from './mixins/sleep-mixin';
Vue.mixin(sleep);

import CKEditor from 'ckeditor4-vue';
Vue.use( CKEditor );

Vue.component(
	'passport-authorized-clients',
	require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
	'passport-clients',
	require('./components/passport/Clients.vue')
);

Vue.component(
	'passport-personal-access-tokens',
	require('./components/passport/PersonalAccessTokens.vue')
);

Vue.component('meli-create-user', require('./components/meli-create-user.vue').default);
Vue.component('product', require('./components/web/shop/product.vue').default);
Vue.component('wrapper_product', require('./components/web/shop/wrapper-product.vue').default);
Vue.component('fetchdata', require('./components/web/fetchdata.vue').default);
Vue.component('loading-spinner', require('./components/loading-spinner.vue').default);
Vue.component('tt-collapse-menu', require('./components/web/tt-collapse-menu.vue').default);
Vue.component('product-quick-view', require('./components/web/product-quick-view.vue').default);

/** APP - PUBLICATIONS */
Vue.component('new-publication', require('./components/app/publications/new.vue').default);
Vue.component('attr-color', require('./components/app/products/attributes/attr-color.vue').default);
Vue.component('attr-size', require('./components/app/products/attributes/attr-size.vue').default);
Vue.component('variations-table', require('./components/app/products/variations/variations-table.vue').default);
Vue.component('button-new-variation', require('./components/app/products/variations/button-new-variation.vue').default);
Vue.component('increment', require('./components/app/products/variations/increment.vue').default);

Vue.component('upload-image', require('./components/app/products/attributes/upload-image.vue').default);

Vue.component('wrapper_variations', require('./components/app/mercadolibre/variations/wrapper-variations.vue').default);

/** PRODUCTS */
Vue.component('new-product', require('./components/app/products/new.vue').default);
Vue.component('price_product', require('./components/app/products/price/price-product.vue').default);

/** NAV - NAVEGACION */
Vue.component('nav_wrapper', require('./components/app/nav/nav_wrapper.vue').default);
Vue.component('nav_shoes', require('./components/app/nav/nav_shoes.vue').default);
Vue.component('nav_publications', require('./components/app/nav/nav_publications.vue').default);
Vue.component('nav_variations', require('./components/app/nav/nav_variations.vue').default);
Vue.component('nav_publications_meli', require('./components/app/nav/nav_publications_meli.vue').default);
Vue.component('nav_mercadopago', require('./components/app/nav/mercado_pago.vue').default);
Vue.component('nav_orders', require('./components/app/nav/orders.vue').default);
Vue.component('nav_customers', require('./components/app/nav/nav_customer.vue').default);
Vue.component('nav_provider_wrapper', require('./components/app/nav/nav_provider_wrapper.vue').default);
Vue.component('nav_providers', require('./components/app/nav/nav_provider.vue').default);
Vue.component('nav_company', require('./components/app/nav/nav_company.vue').default);
Vue.component('nav_pedidos', require('./components/app/nav/nav_pedidos.vue').default);
Vue.component('nav_arba', require('./components/app/nav/nav_arba.vue').default);
Vue.component('nav_categories', require('./components/app/nav/nav_categories.vue').default);
Vue.component('nav_products', require('./components/app/nav/nav_products.vue').default);
Vue.component('nav_price_list', require('./components/app/nav/nav_price_list.vue').default);

/**VARIATIONS */
Vue.component('new_variation', require('./components/app/variations/new.vue').default);
/** INFO */
//Vue.component('publication_by_product', require('./components/app/info/variations-by-product.vue').default);

/** WEB - PUBLICATIONS */
Vue.component('publication', require('./components/web/publication.vue').default);
Vue.component('main_slide', require('./components/web/main-slide.vue').default);
Vue.component('wrapper_category_box_component', require('./components/web/categories/wrapper-category-box-component.vue').default);
Vue.component('sort_products', require('./components/web/shop/sort-products.vue').default);
Vue.component('product_detail', require('./components/web/shop/product-detail.vue').default);
Vue.component('social_icon', require('./components/web/shop/social-icon.vue').default);
Vue.component('related_product', require('./components/web/shop/related-product.vue').default);
Vue.component('search_results_info', require('./components/web/shop/search-results-info.vue').default);
Vue.component('quick_view', require('./components/web/modal/quick-view.vue').default);
Vue.component('categories_nav', require('./components/web/nav/categories.vue').default);
Vue.component('brands_nav', require('./components/web/nav/brands.vue').default);
Vue.component('wr_nav', require('./components/web/nav/wrapper-nav.vue').default);

/** NEWSLETTER */
Vue.component('newsletter_one', require('./components/web/newsletters/newsletter-one.vue').default);

/** MERCADOLIBRE */
Vue.component('publication_list', require('./components/app/mercadolibre/publication_list.vue').default);
Vue.component('account_syncro', require('./components/app/mercadolibre/account-syncro.vue').default);

/** MERCADOPAGO */
Vue.component('payment_list', require('./components/app/mercadopago/payment-list.vue').default);

Vue.component('publication_total', require('./components/app/mercadolibre/widgets/publication-total.vue').default);

/** FILTERS */
Vue.component('wrapper_filters', require('./components/web/nav/wrapper-filters.vue').default);

/**	INSTANT SEARCH */
Vue.component('instant_search', require('./components/web/search/instant-search.vue').default);

/**	ORDERS */
Vue.component('orders_list', require('./components/app/mercadolibre/orders/orders-list.vue').default);
Vue.component('wrapper_order', require('./components/app/mercadolibre/orders/wrapper-order.vue').default);

/** CART */
Vue.component('cart_menu', require('./components/web/cart/cart-menu.vue').default);
Vue.component('wrapper_cart_details', require('./components/web/cart/wrapper-cart-details.vue').default);
Vue.component('cart_sales_process_response', require('./components/web/cart/sales-process_response.vue').default);

/** PEDIDOS */
Vue.component('pedidos_list', require('./components/app/pedidos/pedidos-list.vue').default);

/** IVA-MODAL */
Vue.component('iva_modal', require('./components/app/mercadopago/extras/iva-modal.vue').default);
Vue.component('warning_bill_modal', require('./components/app/mercadopago/extras/warning-bill-modal.vue').default);
/**	MERCADOPAGO PAYMENT BUTTON */
//Vue.component('payment_button', require('./components/web/mercado-pago/payment-button.vue').default);

/**	CUSTOMERS */
Vue.component('generate_voucher', require('./components/app/customers/generate_voucher.vue').default);
Vue.component('invoicelist', require('./components/app/customers/invoices/InvoiceListBase.vue').default);
Vue.component('Customer_list_wrapper', require('./components/app/customers/CustomerListWrapper.vue').default);
Vue.component('Customer_edit', require('./components/app/customers/CustomerEdit.vue').default);

/**	AFIP */
Vue.component('my-data', require('./components/app/afip/my-data.vue').default);

/** ARBA */
Vue.component('arba-alicuota', require('./components/app/arba/ConsultaPorSujeto.vue').default);
/**COMPANY */
Vue.component('my-company', require('./components/app/company/company-data.vue').default);

/** ADD ADDRESS MODAL */
Vue.component('add_address_modal', require('./components/app/customers/modal-add-address.vue').default);
Vue.component('addressnewmodal', require('./components/app/address/AddressNewModal.vue').default);

/** MODAL ERROR */
Vue.component('modal_error', require('./components/app/afip/modal-error.vue').default);

/** WIDGETS */
Vue.component('date_picker_widget', require('./widgets/date-picker-widget.vue').default);

/** COMPRAS */
Vue.component('purchase_invoice_base', require('./components/app/providers/purchase_invoice/PurchaseInvoiceBase.vue').default);
Vue.component('provider_base', require('./components/app/providers/new/ProviderBase.vue').default);
Vue.component('provider_list_vouchers', require('./components/app/providers/purchase_invoice/list/PurchaseInvoiceListBase').default);
Vue.component('purchase_invoice_to_pay', require('./components/app/providers/purchase_invoice/to_pay/PurchaseInvoiceToPayBase').default);
Vue.component('receipt_to_provider_base', require('./components/app/providers/receipts/ReceiptToProviderBase.vue').default);
Vue.component('provider_receipts_list', require('./components/app/providers/receipts/list/ReceiptToProviderListBase.vue').default);

/** PEDIDOS CLIENTES */
Vue.component('pedidos_clientes', require('./components/app/pedidosClientes/PedidoWrapper.vue').default);
Vue.component('pedidos_list_wrapper', require('./components/app/pedidosClientes/PedidoListWrapper.vue').default);
Vue.component('pedidos_edit', require('./components/app/pedidosClientes/PedidoEdit.vue').default);

/** RECIBOS */
Vue.component('customer_recibos', require('./components/app/customers/recibos/CustomerRecibo').default);
Vue.component('customer_recibos_list', require('./components/app/customers/recibos/CustomerReciboList').default);

/** COMANDA */
Vue.component('comanda_list', require('./components/app/pedidosClientes/comanda/ComandaList.vue').default);

/**	ADD ARTICLE MODAL */
Vue.component('add_article_modal', require('./components/app/providers/modal/AddArticleModal.vue').default);

/** ACCOUNTING ACCOUNT*/
Vue.component('accounting_account_modal', require('./components/app/accountingAccount/newAccountingAccountModal.vue').default);
/** ORDER PAYMENT*/
Vue.component('order_payment_base', require('./components/app/providers/order_payment/OrderPaymentBase.vue').default);

Vue.component('publication_list_base', require('./components/app/mercadolibre/publications/list/PublicationListBase.vue').default);

Vue.component('customereditmodal', require('./components/app/customers/edit/CustomerEditModal').default);
Vue.component('customer-new', require('./components/app/customers/new/CustomerBase').default);

Vue.component('notification_message_wrapper', require('./components/app/notifications/NotificationMessageWrapper').default);

//Vue.component('nav_user_menu', require('./components/app/user/nav-user-menu').default);
Vue.component('messages_pos_sale', require('./components/app/mercadolibre/messages/MessagesPosSale.vue').default);

Vue.component('commission_list', require('./components/app/user/CommissionList').default);

/** ADMIN **/
Vue.component('activate_user_wrapper', require('./components/app/admin/activate-user/ActivateUserWrapper').default);
Vue.component('admin_taxes', require('./components/app/admin/taxes/TaxesList').default);
Vue.component('category-wrapper', require('./components/app/admin/categories/New/Main').default);
Vue.component('category-list-wrapper', require('./components/app/admin/categories/List/CategoryListWrapper').default);
Vue.component('ultimo_autorizado', require('./components/app/admin/afip/ultimo_autorizado').default);
Vue.component('new_product', require('./components/app/admin/products/new/Product-form').default);
Vue.component('list_product', require('./components/app/admin/products/List/ProductListWrapper').default);
Vue.component('show_product', require('./components/app/admin/products/Show/ShowProductWrapper').default);
Vue.component('edit_product', require('./components/app/admin/products/Edit/EditProduct').default);

/** PRICE LIST */
Vue.component('price_list_new', require('./components/app/admin/price-list/New/PriceListNew').default);

/** ORDER NEW */
Vue.component('order_new', require('./components/app/admin/orders/New/OrderNew').default);

import store from "./vuex/store";

const app = new Vue({
	el: '#app',
	store,
});
