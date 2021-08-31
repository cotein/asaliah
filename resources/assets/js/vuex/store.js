window.Vue = require('vue');
import Vuex from 'vuex';
import Mediator from './store-mediator';
Vue.use(Vuex);

import AccountingAccount from './modules/app/AccountingAccounts';
import ActivateUser from './modules/Admin/ActivateUser/index';
import Address from './modules/app/Address';
import AddressType from './modules/app/AddressType';
import Article from './modules/app/Article';
import CategoriesList from './modules/Admin/Categories/List';
import Company from './modules/app/Company';
import CustomerErrors from './modules/app/CustomerErrors';
import CustomerInvoicesList from './modules/app/CustomerInvoiceList';
import CustomerNew from './modules/app/CustomerNew';
import CustomerRecibo from './modules/app/CustomerRecibo';
import CustomersData from './modules/app/CustomerData';
import CustomersList from './modules/app/CustomerList';
import CustomerSearch from './modules/Admin/Customer/index';
import Inscriptions from './modules/app/Inscriptions';
import IvaCompras from './modules/app/Provider/IvaCompras/';
import MeasurementUnities from './modules/app/MeasureUnity';
import Messages from './modules/mercadolibre/Messages';
import MetricVisits from './modules/mercadolibre/MetricVisits';
import OrderPayment from './modules/app/OrderPayment';
import OrdersMeli from './modules/mercadolibre/Orders';
import PaymentType from './modules/app/PaymentType';
import PedidosClientesEdit from './modules/app/PedidosClientesEdit';
import PedidosClientesStatus from './modules/app/PedidosClientesStatus';
import Provider from './modules/app/Provider/index';
import ProviderErrors from './modules/app/ProviderErrors';
import PublicationList from './modules/mercadolibre/PublicationList';
import PurchaseInvoice from './modules/app/Purchaser/Iva';
import PurchaseInvoiceErrors from './modules/app/PurchaseInvoiceErrors';
import PurchaseInvoiceList from './modules/app/PurchaseInvoiceList';
import PurchaseInvoiceToPay from './modules/app/PurchaseInvoiceToPay';
import PurchaserDocuments from './modules/app/PurchaserDocuments';
import Questions from './modules/mercadolibre/Questions';
import ReceiptToProviders from './modules/app/ReceiptToProviders';
import ReceiptToProvidersList from './modules/app/ReceiptToProvidersList';
import Roles from './modules/Admin/Roles/index';
import Tax from './modules/app/Taxes/';
import TaxesTypes from './modules/app/Taxes/Type';
import UserCommission from './modules/app/UserCommission';
import Variation_meli from './modules/mercadolibre/Variations';
import VuexPersist from 'vuex-persist';
import app from './modules/app';
import arba from './modules/arba/arba';
import attributes from './modules/attributes';
import billiable_products from './modules/app/billable-products';
import brands from './modules/brands';
import brands_web from './modules/web/brands';
import buying_mode from './modules/buying_mode';
import cart from './modules/web/cart';
import categories from './modules/Admin/Categories';
import cities from './modules/web/cities';
import colour from './modules/colour';
import countries from './modules/web/countries';
import customers from './modules/app/Customer';
import detail_product from './modules/web/product_detail';
import filters from './modules/web/filters';
import item_condition from './modules/item_condition';
import ivas from './modules/ivas';
import ProductsList from './modules/Admin/Products/List';
import ProductsEdit from './modules/Admin/Products/Edit';
import mercadolibre_publications from './modules/mercadolibre/Publications';
import modal_error from './modules/modal_error';
import money from './modules/money';
import newsletter from './modules/web/newsletter';
import notifications from './modules/notifications';
import orders from './modules/app/orders';
import pedidos from './modules/app/pedidos';
import pedidos_clientes from './modules/app/pedidos_clientes';
import price_lists from './modules/app/PriceLists';
import products from './modules/Admin/Products/New';
import provinces from './modules/web/provinces';
import publications from './modules/web/publications';
import publications_from_here from './modules/app/publications';
import publish from './modules/app/publish';
import sale_invoice from './modules/app/SaleInvoice';
import search from './modules/web/search';
import subcategories from './modules/subcategories';
import suppliers from './modules/suppliers';
import user from './modules/user';
import variations from './modules/variations';
import vouchers from './modules/app/Vouchers';
import wsfe from './modules/afip/wsfe';
import wspuc from './modules/afip/WSPUC';
import PriceList from './modules/Admin/PriceList';
import NewOrder from './modules/Admin/Orders'
import Afip from './modules/Admin/Afip';

const vueLocalStorage = new VuexPersist({
    key: 'vuex',
    storage: window.sessionStorage,
    modules : ['cart', 'PurchaseInvoiceToPay', 'Messages', 'OrdersMeli', 'Company']
});

const store = new Vuex.Store({
    modules : {
        app,
        products,
        colour,
        categories,
        ivas,
        money,
        buying_mode,
        user,
        subcategories,
        item_condition,
        variations,
        publications,
        suppliers,
        brands,
        attributes,
        notifications,
        publish,
        publications_from_here,
        newsletter,
        detail_product,
        brands_web,
        filters,
        search,
        OrdersMeli,
        orders,
        cart,
        provinces,
        countries,
        cities,
        pedidos,
        billiable_products,
        vouchers,
        customers,
        wspuc,
        Company,
        wsfe,
        modal_error,
        Provider,
        PurchaseInvoice,
        sale_invoice,
        CustomerInvoicesList,
        price_lists,
        pedidos_clientes,
        arba,
        CustomersList,
        CustomersData,
        AddressType,
        Address,
        PedidosClientesStatus,
        PedidosClientesEdit,
        CustomerRecibo,
        mercadolibre_publications,
        MeasurementUnities,
        Article,
        AccountingAccount,
        Tax,
        TaxesTypes,
        PurchaserDocuments,
        Inscriptions,
        ProviderErrors,
        PurchaseInvoiceErrors,
        PurchaseInvoiceList,
        PurchaseInvoiceToPay,
        PublicationList,
        Variation_meli,
        OrderPayment,
        ReceiptToProviders,
        ReceiptToProvidersList,
        CustomerNew,
        CustomerErrors,
        Questions,
        MetricVisits,
        Messages,
        PaymentType,
        UserCommission,
        ActivateUser,
        Roles,
        IvaCompras,
        CategoriesList,
        ProductsList,
        ProductsEdit,
        PriceList,
        CustomerSearch,
        NewOrder,
        Afip

    },
    plugins: [vueLocalStorage.plugin]

});

Mediator(store);

export default store;
