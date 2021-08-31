<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2014_10_12_100000_create_password_resets_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2016_06_01_000001_create_oauth_auth_codes_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2016_06_01_000002_create_oauth_access_tokens_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'migration' => '2016_06_01_000003_create_oauth_refresh_tokens_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'migration' => '2016_06_01_000004_create_oauth_clients_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'migration' => '2016_06_01_000005_create_oauth_personal_access_clients_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'migration' => '2019_03_20_171539_create_products_table',
                'batch' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'migration' => '2019_03_20_181835_create_categories_table',
                'batch' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'migration' => '2019_03_20_184259_create_hot_offers_table',
                'batch' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'migration' => '2019_03_20_210348_create_ivas_table',
                'batch' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'migration' => '2019_03_20_210737_create_cities_table',
                'batch' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'migration' => '2019_03_21_002324_create_type_users_table',
                'batch' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'migration' => '2019_03_21_003043_create_inscription_table',
                'batch' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'migration' => '2019_03_21_004222_create_regimens_table',
                'batch' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'migration' => '2019_03_21_004316_create_statuses_table',
                'batch' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'migration' => '2019_03_21_005137_create_provinces_table',
                'batch' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'migration' => '2019_03_21_005257_create_colours_table',
                'batch' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'migration' => '2019_03_21_005639_create_moneys_table',
                'batch' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'migration' => '2019_03_27_202717_create_brands_table',
                'batch' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'migration' => '2019_03_28_002654_create_category_product_table',
                'batch' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'migration' => '2019_03_30_131934_create_media_table',
                'batch' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'migration' => '2019_04_06_175855_create_shippment_modes_table',
                'batch' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'migration' => '2019_04_06_181230_create_publication_types_table',
                'batch' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'migration' => '2019_04_06_181917_create_item_conditions_table',
                'batch' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'migration' => '2019_05_08_175857_create_web_users_table',
                'batch' => 1,
            ),
            26 => 
            array (
                'id' => 27,
                'migration' => '2019_05_08_194712_create_priorities_table',
                'batch' => 1,
            ),
            27 => 
            array (
                'id' => 28,
                'migration' => '2019_05_11_135911_create_sizes_table',
                'batch' => 1,
            ),
            28 => 
            array (
                'id' => 29,
                'migration' => '2019_05_11_140447_create_product_size_table',
                'batch' => 1,
            ),
            29 => 
            array (
                'id' => 30,
                'migration' => '2019_05_12_143856_create_colour_product_table',
                'batch' => 1,
            ),
            30 => 
            array (
                'id' => 31,
                'migration' => '2019_05_27_204827_create_activity_log_table',
                'batch' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'migration' => '2019_05_28_184210_create_publications_table',
                'batch' => 1,
            ),
            32 => 
            array (
                'id' => 33,
                'migration' => '2019_06_27_163235_create_addresses_table',
                'batch' => 1,
            ),
            33 => 
            array (
                'id' => 34,
                'migration' => '2019_06_27_203044_create_brand_supplier_table',
                'batch' => 1,
            ),
            34 => 
            array (
                'id' => 35,
                'migration' => '2019_06_28_181626_create_stocks_table',
                'batch' => 1,
            ),
            35 => 
            array (
                'id' => 36,
                'migration' => '2019_06_28_192538_create_audits_table',
                'batch' => 1,
            ),
            36 => 
            array (
                'id' => 37,
                'migration' => '2019_08_07_182906_create_variations_table',
                'batch' => 1,
            ),
            37 => 
            array (
                'id' => 38,
                'migration' => '2019_08_07_185229_create_pictures_table',
                'batch' => 1,
            ),
            38 => 
            array (
                'id' => 39,
                'migration' => '2019_09_16_200258_create_mailings_table',
                'batch' => 1,
            ),
            39 => 
            array (
                'id' => 40,
                'migration' => '2019_09_30_193536_create_genders_table',
                'batch' => 1,
            ),
            40 => 
            array (
                'id' => 41,
                'migration' => '2019_09_30_193700_create_type_shoes_table',
                'batch' => 1,
            ),
            41 => 
            array (
                'id' => 42,
                'migration' => '2019_09_30_193730_create_materials_table',
                'batch' => 1,
            ),
            42 => 
            array (
                'id' => 43,
                'migration' => '2019_09_30_193755_create_seasons_table',
                'batch' => 1,
            ),
            43 => 
            array (
                'id' => 44,
                'migration' => '2019_11_17_235201_create_banks_table',
                'batch' => 1,
            ),
            44 => 
            array (
                'id' => 45,
                'migration' => '2019_11_17_235546_create_states_table',
                'batch' => 1,
            ),
            45 => 
            array (
                'id' => 46,
                'migration' => '2019_11_18_000123_create_vouchers_table',
                'batch' => 1,
            ),
            46 => 
            array (
                'id' => 47,
                'migration' => '2019_11_18_113257_create_purchaser_documents_table',
                'batch' => 1,
            ),
            47 => 
            array (
                'id' => 48,
                'migration' => '2019_11_18_114437_create_measure_unities_table',
                'batch' => 1,
            ),
            48 => 
            array (
                'id' => 49,
                'migration' => '2019_11_18_115042_create_coins_table',
                'batch' => 1,
            ),
            49 => 
            array (
                'id' => 50,
                'migration' => '2019_11_18_115933_create_cuit_sujetos_table',
                'batch' => 1,
            ),
            50 => 
            array (
                'id' => 51,
                'migration' => '2019_11_18_120510_create_sujetos_table',
                'batch' => 1,
            ),
            51 => 
            array (
                'id' => 52,
                'migration' => '2019_11_18_121011_create_included_concepts_table',
                'batch' => 1,
            ),
            52 => 
            array (
                'id' => 53,
                'migration' => '2020_01_03_162813_create_shopping_carts_table',
                'batch' => 1,
            ),
            53 => 
            array (
                'id' => 54,
                'migration' => '2020_01_03_162846_create_shopping_cart_details_table',
                'batch' => 1,
            ),
            54 => 
            array (
                'id' => 55,
                'migration' => '2020_01_09_204445_create_payments_table',
                'batch' => 1,
            ),
            55 => 
            array (
                'id' => 56,
                'migration' => '2020_01_09_204505_create_shopping_cart_items_table',
                'batch' => 1,
            ),
            56 => 
            array (
                'id' => 57,
                'migration' => '2020_01_09_204525_create_orders_table',
                'batch' => 1,
            ),
            57 => 
            array (
                'id' => 58,
                'migration' => '2020_02_26_162603_create_companies_table',
                'batch' => 1,
            ),
            58 => 
            array (
                'id' => 59,
                'migration' => '2020_03_27_174127_create_customers_table',
                'batch' => 1,
            ),
            59 => 
            array (
                'id' => 60,
                'migration' => '2020_05_02_124853_create_sale_invoices_table',
                'batch' => 1,
            ),
            60 => 
            array (
                'id' => 61,
                'migration' => '2020_05_07_153246_create_sale_invoice_items_table',
                'batch' => 1,
            ),
            61 => 
            array (
                'id' => 62,
                'migration' => '2020_05_18_133054_create_purchase_invoices_table',
                'batch' => 1,
            ),
            62 => 
            array (
                'id' => 63,
                'migration' => '2020_05_18_133804_create_providers_table',
                'batch' => 1,
            ),
            63 => 
            array (
                'id' => 64,
                'migration' => '2020_05_18_143021_create_purchase_invoice_items_table',
                'batch' => 1,
            ),
            64 => 
            array (
                'id' => 65,
                'migration' => '2020_05_28_123159_create_afips_table',
                'batch' => 1,
            ),
            65 => 
            array (
                'id' => 66,
                'migration' => '2020_06_27_112820_create_sale_invoice_observations_table',
                'batch' => 1,
            ),
            66 => 
            array (
                'id' => 67,
                'migration' => '2020_07_04_214002_add_obs_field_to_sale_invoice_items',
                'batch' => 1,
            ),
            67 => 
            array (
                'id' => 68,
                'migration' => '2020_07_15_143729_add_ret_and_percep_fields',
                'batch' => 1,
            ),
            68 => 
            array (
                'id' => 69,
                'migration' => '2020_07_18_225245_create_pricelist_products_table',
                'batch' => 1,
            ),
            69 => 
            array (
                'id' => 70,
                'migration' => '2020_07_19_120811_create__price_list_table',
                'batch' => 1,
            ),
            70 => 
            array (
                'id' => 71,
                'migration' => '2020_07_21_144110_create_pedidos_clientes_table',
                'batch' => 1,
            ),
            71 => 
            array (
                'id' => 72,
                'migration' => '2020_07_21_145522_create_pedidos_clientes_items_table',
                'batch' => 1,
            ),
            72 => 
            array (
                'id' => 73,
                'migration' => '2020_07_27_170045_add_fiels_to_customer',
                'batch' => 1,
            ),
            73 => 
            array (
                'id' => 74,
                'migration' => '2020_07_27_174725_add_fiels_to_caddresses_table',
                'batch' => 1,
            ),
            74 => 
            array (
                'id' => 75,
                'migration' => '2020_07_29_115019_add_iibb_fields_to_company_table',
                'batch' => 1,
            ),
            75 => 
            array (
                'id' => 76,
                'migration' => '2020_07_29_164950_create_street_types_table',
                'batch' => 1,
            ),
            76 => 
            array (
                'id' => 77,
                'migration' => '2020_07_30_192019_add_fields_to_pedidos_clientes_table',
                'batch' => 1,
            ),
            77 => 
            array (
                'id' => 78,
                'migration' => '2020_07_30_192856_add_meli_fields_to_customers_table',
                'batch' => 1,
            ),
            78 => 
            array (
                'id' => 79,
                'migration' => '2020_07_31_202702_add_is_meli_field_to_pedidos_clientes_table',
                'batch' => 1,
            ),
            79 => 
            array (
                'id' => 80,
                'migration' => '2020_08_01_095503_add_iibb_percentage_to_sale_invoices_table',
                'batch' => 1,
            ),
            80 => 
            array (
                'id' => 81,
                'migration' => '2020_08_05_014107_create_pedidos_clientes_status_table',
                'batch' => 1,
            ),
            81 => 
            array (
                'id' => 82,
                'migration' => '2020_08_05_112505_add_created_date_field_on_meli_on_pedido_clientes_table',
                'batch' => 1,
            ),
            82 => 
            array (
                'id' => 83,
                'migration' => '2020_08_08_084953_create_remitos_table',
                'batch' => 1,
            ),
            83 => 
            array (
                'id' => 84,
                'migration' => '2020_08_10_142946_create_comments_table',
                'batch' => 1,
            ),
            84 => 
            array (
                'id' => 85,
                'migration' => '2020_08_11_180107_create_payment_types_table',
                'batch' => 1,
            ),
            85 => 
            array (
                'id' => 86,
                'migration' => '2020_08_11_191048_add_searching_field_to_sale_invoices_table',
                'batch' => 1,
            ),
            86 => 
            array (
                'id' => 87,
                'migration' => '2020_08_12_165023_create_receipts_table',
                'batch' => 1,
            ),
            87 => 
            array (
                'id' => 88,
                'migration' => '2020_08_12_165423_create_receipt_invoices_table',
                'batch' => 1,
            ),
            88 => 
            array (
                'id' => 89,
                'migration' => '2020_08_12_165519_create_receipt_cancelations_table',
                'batch' => 1,
            ),
            89 => 
            array (
                'id' => 90,
                'migration' => '2020_08_13_201242_add_date_field_to_receipt_table',
                'batch' => 1,
            ),
            90 => 
            array (
                'id' => 91,
                'migration' => '2020_08_13_205959_add_fields_to_receipt_invoices_table',
                'batch' => 1,
            ),
            91 => 
            array (
                'id' => 92,
                'migration' => '2020_08_14_133836_add_totals_fields_to_receipt_table',
                'batch' => 1,
            ),
            92 => 
            array (
                'id' => 93,
                'migration' => '2020_08_14_135903_add_diff_import_field_to_receipt_table',
                'batch' => 1,
            ),
            93 => 
            array (
                'id' => 94,
                'migration' => '2020_08_14_154548_rename_receip_in_in_receipt_invoices_table',
                'batch' => 1,
            ),
            94 => 
            array (
                'id' => 95,
                'migration' => '2020_08_14_193120_add_invoice_id_field_to_receipt_cancelations_table',
                'batch' => 1,
            ),
            95 => 
            array (
                'id' => 96,
                'migration' => '2020_08_14_202301_rename_receip_id_in_receipt_cancelations',
                'batch' => 1,
            ),
            96 => 
            array (
                'id' => 97,
                'migration' => '2020_08_15_113023_add_bank_id_to_receipt_cancelations_table',
                'batch' => 1,
            ),
            97 => 
            array (
                'id' => 98,
                'migration' => '2020_08_18_141502_add_meli_info_field_to_products',
                'batch' => 1,
            ),
            98 => 
            array (
                'id' => 99,
                'migration' => '2020_08_21_171722_add_user_id_on_pedidos_clientes_status_table',
                'batch' => 1,
            ),
            99 => 
            array (
                'id' => 100,
                'migration' => '2020_08_22_182943_add_print_field_to_comments_table',
                'batch' => 1,
            ),
            100 => 
            array (
                'id' => 101,
                'migration' => '2020_08_22_231056_add_has_afip_data_on_customer_table',
                'batch' => 1,
            ),
            101 => 
            array (
                'id' => 102,
                'migration' => '2020_08_29_131646_add_receipt_id_cancelation_field_to_receipt_table',
                'batch' => 1,
            ),
            102 => 
            array (
                'id' => 103,
                'migration' => '2020_09_07_154713_create_accounting_accounts_table',
                'batch' => 1,
            ),
            103 => 
            array (
                'id' => 104,
                'migration' => '2020_09_08_181109_create_articles_table',
                'batch' => 1,
            ),
            104 => 
            array (
                'id' => 105,
                'migration' => '2020_09_08_182943_create_article_purchase_invoice_table',
                'batch' => 1,
            ),
            105 => 
            array (
                'id' => 106,
                'migration' => '2020_09_08_185006_create_purchase_invoice_taxes_table',
                'batch' => 1,
            ),
            106 => 
            array (
                'id' => 107,
                'migration' => '2020_09_09_182646_add_fiels_to_providers_table',
                'batch' => 1,
            ),
            107 => 
            array (
                'id' => 108,
                'migration' => '2020_09_12_182358_create_taxes_table',
                'batch' => 1,
            ),
            108 => 
            array (
                'id' => 109,
                'migration' => '2020_09_12_182414_create_tax_types_table',
                'batch' => 1,
            ),
            109 => 
            array (
                'id' => 110,
                'migration' => '2020_09_16_162143_add_fields_to_providers_table',
                'batch' => 1,
            ),
            110 => 
            array (
                'id' => 111,
                'migration' => '2020_09_16_163224_add_fields_to_customers_table',
                'batch' => 1,
            ),
            111 => 
            array (
                'id' => 112,
                'migration' => '2020_09_16_163357_create_pay_conditions_table',
                'batch' => 1,
            ),
            112 => 
            array (
                'id' => 113,
                'migration' => '2020_09_17_192749_create_provider_regimens_table',
                'batch' => 1,
            ),
            113 => 
            array (
                'id' => 114,
                'migration' => '2020_09_22_143947_add_fields_to_tax_table',
                'batch' => 1,
            ),
            114 => 
            array (
                'id' => 115,
                'migration' => '2020_09_22_190924_create_accounting_years_table',
                'batch' => 1,
            ),
            115 => 
            array (
                'id' => 116,
                'migration' => '2020_09_22_192036_create_daily_movements_table',
                'batch' => 1,
            ),
            116 => 
            array (
                'id' => 117,
                'migration' => '2020_09_22_192315_create_daily_movement_items_table',
                'batch' => 1,
            ),
            117 => 
            array (
                'id' => 118,
                'migration' => '2020_09_23_140926_add_type_field_to_daily_movements',
                'batch' => 1,
            ),
            118 => 
            array (
                'id' => 119,
                'migration' => '2020_09_23_141221_create_daily_movement_types_table',
                'batch' => 1,
            ),
            119 => 
            array (
                'id' => 120,
                'migration' => '2020_09_25_124242_add_inscription_field_to_vouchers_table',
                'batch' => 1,
            ),
            120 => 
            array (
                'id' => 121,
                'migration' => '2020_09_25_132011_add_inscription_field_to_iva_table',
                'batch' => 1,
            ),
            121 => 
            array (
                'id' => 122,
                'migration' => '2020_09_30_161232_create_payment_orders_table',
                'batch' => 1,
            ),
            122 => 
            array (
                'id' => 123,
                'migration' => '2020_10_01_150135_create_receipt_payment_to_providers_table',
                'batch' => 1,
            ),
            123 => 
            array (
                'id' => 124,
                'migration' => '2020_10_01_150411_create_payment_on_accounts_table',
                'batch' => 1,
            ),
            124 => 
            array (
                'id' => 125,
                'migration' => '2020_10_02_170204_create_payment_order_items_table',
                'batch' => 1,
            ),
            125 => 
            array (
                'id' => 126,
                'migration' => '2020_10_03_140226_create_web_hooks_table',
                'batch' => 1,
            ),
            126 => 
            array (
                'id' => 127,
                'migration' => '2020_10_07_112832_create_receipt_payment_to_provider_orders_table',
                'batch' => 1,
            ),
            127 => 
            array (
                'id' => 128,
                'migration' => '2020_10_07_113027_create_receipt_payment_to_provider_cancelation_documents_table',
                'batch' => 1,
            ),
            128 => 
            array (
                'id' => 129,
                'migration' => '2020_10_07_113854_create_receipt_payment_to_provider_rceipts_table',
                'batch' => 1,
            ),
            129 => 
            array (
                'id' => 130,
                'migration' => '2020_10_22_144612_create_pedido_cliente_addresses_table',
                'batch' => 1,
            ),
            130 => 
            array (
                'id' => 131,
                'migration' => '2020_10_23_194336_add_fields_to_web_hooks_table',
                'batch' => 1,
            ),
            131 => 
            array (
                'id' => 132,
                'migration' => '2020_10_27_184340_add_fields_to_purchase_invoice_table',
                'batch' => 1,
            ),
            132 => 
            array (
                'id' => 133,
                'migration' => '2020_10_28_173437_create_receipt_payment_to_providers_invoices_table',
                'batch' => 1,
            ),
            133 => 
            array (
                'id' => 134,
                'migration' => '2020_11_04_202443_create_customer_types_table',
                'batch' => 1,
            ),
            134 => 
            array (
                'id' => 135,
                'migration' => '2020_11_04_202723_add_customer_type_field_to_customers_table',
                'batch' => 1,
            ),
            135 => 
            array (
                'id' => 136,
                'migration' => '2020_11_06_174437_add_accounting_accounts_field_to_customer_table',
                'batch' => 1,
            ),
            136 => 
            array (
                'id' => 137,
                'migration' => '2020_11_11_194236_create_web_hook_responses_table',
                'batch' => 1,
            ),
            137 => 
            array (
                'id' => 138,
                'migration' => '2020_11_12_125747_create_web_hook_messages_table',
                'batch' => 1,
            ),
            138 => 
            array (
                'id' => 139,
                'migration' => '2020_11_12_130244_create_web_hook_questions_table',
                'batch' => 1,
            ),
            139 => 
            array (
                'id' => 140,
                'migration' => '2020_12_12_121855_create_meli_tokens_table',
                'batch' => 1,
            ),
            140 => 
            array (
                'id' => 141,
                'migration' => '2020_12_29_185828_create_commissions_table',
                'batch' => 1,
            ),
            141 => 
            array (
                'id' => 142,
                'migration' => '2020_12_30_133223_add_pay_method_id_to_pedido_clientes',
                'batch' => 1,
            ),
            142 => 
            array (
                'id' => 143,
                'migration' => '2020_12_30_160617_add_percentage_field_to_payment_types_table',
                'batch' => 1,
            ),
            143 => 
            array (
                'id' => 144,
                'migration' => '2021_01_13_200747_add_level_field_to_type_users_table',
                'batch' => 1,
            ),
            144 => 
            array (
                'id' => 145,
                'migration' => '2021_01_21_180052_create_momement_type_field_on_taxes_table',
                'batch' => 1,
            ),
            145 => 
            array (
                'id' => 146,
                'migration' => '2021_01_21_180134_create_movement_types_table',
                'batch' => 1,
            ),
            146 => 
            array (
                'id' => 147,
                'migration' => '2021_01_27_171001_add_active_field_to_taxes_table',
                'batch' => 1,
            ),
            147 => 
            array (
                'id' => 148,
                'migration' => '2021_02_09_124158_add_search_field_on_product_table',
                'batch' => 1,
            ),
            148 => 
            array (
                'id' => 149,
                'migration' => '2021_03_15_135546_add_settings_field_to_companies_table',
                'batch' => 1,
            ),
            149 => 
            array (
                'id' => 150,
                'migration' => '2021_03_15_222038_create_bank_accounts_table',
                'batch' => 1,
            ),
            150 => 
            array (
                'id' => 151,
                'migration' => '2021_03_15_223736_create_account_types_table',
                'batch' => 1,
            ),
            151 => 
            array (
                'id' => 152,
                'migration' => '2021_03_29_230625_add_fields_to_company_table',
                'batch' => 1,
            ),
            152 => 
            array (
                'id' => 153,
                'migration' => '2021_03_29_231346_add_fields_to_sale_invoice_table',
                'batch' => 1,
            ),
            153 => 
            array (
                'id' => 154,
                'migration' => '2021_05_10_191717_create_table_pedido_cliente_remito_table',
                'batch' => 2,
            ),
            154 => 
            array (
                'id' => 156,
                'migration' => '2021_05_10_193748_add_fields_to_remito_table',
                'batch' => 2,
            ),
            155 => 
            array (
                'id' => 157,
                'migration' => '2021_05_13_132555_add_fields_to_sale_invoices_table',
                'batch' => 2,
            ),
            156 => 
            array (
                'id' => 158,
                'migration' => '2021_05_13_174052_add_fields_to_sale_invoices_table',
                'batch' => 3,
            ),
            157 => 
            array (
                'id' => 159,
                'migration' => '2021_05_14_164008_add_field_pedido_cliente_id_to_sales_invoices',
                'batch' => 4,
            ),
            158 => 
            array (
                'id' => 160,
                'migration' => '2021_05_14_164920_add_field_sale_invoice_id_to_pedidos_clientes',
                'batch' => 4,
            ),
            159 => 
            array (
                'id' => 161,
                'migration' => '2021_05_20_173031_add_parent_id_fiel_to_sale_invoices_table',
                'batch' => 5,
            ),
            160 => 
            array (
                'id' => 162,
                'migration' => '2021_05_13_174052_add_fields_to_sales_invoices_table',
                'batch' => 5,
            ),
            161 => 
            array (
                'id' => 163,
                'migration' => '2021_05_30_234741_add_name_field_to_daily_movement_table',
                'batch' => 6,
            ),
            162 => 
            array (
                'id' => 164,
                'migration' => '2021_06_01_025755_add_polimorphic_fields_to_daily_movements_table',
                'batch' => 7,
            ),
            163 => 
            array (
                'id' => 165,
                'migration' => '2021_06_05_112330_add_pedido_cliente_id_to_remito_table',
                'batch' => 8,
            ),
            164 => 
            array (
                'id' => 166,
                'migration' => '2021_06_05_130551_add_fields_to_remito_table',
                'batch' => 9,
            ),
            165 => 
            array (
                'id' => 167,
                'migration' => '2021_05_10_192837_create_table_remito_items_table',
                'batch' => 10,
            ),
            166 => 
            array (
                'id' => 168,
                'migration' => '2021_07_06_170711_add_benefit_field_to_price_list_table',
                'batch' => 11,
            ),
        ));
        
        
    }
}