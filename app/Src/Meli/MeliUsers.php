<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;

class MeliUsers extends MiMeli
{
    public function create_test_user()
    {
        $params = [
            'site_id' => $this->site
        ];
       
        return Meli::withToken(auth()->user()->company->mercadoLibre->meli_token)->post('/users/test_user', $params);
    }

    public function meli_logout($go = NULL)
    {   
        $params = [
            $client_id = config('services.meli.client_id'),
            $go => '',
            $platform_id = 'ml',
        ];

        return redirect()->away('https://www.mercadolibre.com/jms/mla/lgz/logout?go=www.google.com&response_type=code&client_id=6886428381996727&platform_id=ml');
        //return Meli::withToken(auth()->user()->company->mercadoLibre->meli_token)->post('/jms/mla/lgz/logout', $params);
        //http://www.mercadolibre.com/jms/mpe/lgz/logout?go=https%3A%2F%2Fauth.mercadolibre.com.pe%2Fauthorization%3Fresponse_type%3Dcode%26client_id%3D{YOUR_CLIENT_ID}&platform_id=ml
    }

    public function get_publication_ids($offset=0, $limit=50)
    {
        $params = [
              
            'offset' => $offset,
            'limit' => $limit,
        ];
        //return Meli::get('users/' . $seller_id . '/items/search');
        return Meli::withToken(auth()->user()->company->mercadoLibre->meli_token)->get('/users/' . auth()->user()->company->mercadoLibre->meli_user_id . '/items/search', $params);
    }

    public function get_seller_by_id($user_id)
    {
        return Meli::withToken(auth()->user()->company->mercadoLibre->meli_token)->post('/users/'. $user_id);
    }

    public function me()
    {
        return Meli::withToken(auth()->user()->company->mercadoLibre->meli_token)->post('/users/me');
    }

    public function total_visits($user, $date_from, $date_to)
    {
        $params = null;

        $body=null;
        
        return Meli::get('/users/'.$user.'/items_visits?date_from=' . $date_from . '&date_to=' . $date_to);
        
    }

    public function last_month_visits($user_id, $days=30)
    {
        return Meli::get('/users/' . $user_id . '/items_visits/time_window?last=' . $days . '&unit=day');
    }
}


/** Cerrar sesión
  *https://www.mercadolibre.com/jms/mla/lgz/logout?go=https://auth.mercadolibre.com.ar/authorization?redirect_uri=mysite&response_type=code&client_id=CLIENT_ID&platform_id=ml
 */

/**
 * Usuario de Venta
 * {"body":{"id":438749068,"nickname":"TESTJAJYHG4Q",
 * password":"qatest2074",
 * "site_status":"active",
 * "email":"test_user_416613@testuser.com"},"httpCode":201}
 */

 /**
  * Usuario Comprador 2
  * +"id": 727194985
    * +"nickname": "TETE6447876"
    * +"password": "qatest1452"
    * +"site_status": "active"
    * +"email": "test_user_1165980@testuser.com"
  */
 /**
     * Test de usuario - Comprador
     *   email: "test_user_68313977@testuser.com"
     *   id: 423831121
     *   nickname: "TESTWCBNLWU3"
     *   password: "qatest5990"
     *   site_status: "active" 
  */

 /**
  * Respuesta cuando se crea un item
  * {"body":{"id":"MLA786631694","site_id":"MLA","title":"Prueba - No Ofertar -------","subtitle":null,"seller_id":1157128,"category_id":"MLA381790","official_store_id":null,"price":1111,"base_price":1111,"original_price":null,"inventory_id":null,"currency_id":"ARS","initial_quantity":111,"available_quantity":111,"sold_quantity":0,"sale_terms":[{"id":"WARRANTY_TYPE","name":"Tipo de garant\u00eda","value_id":"2230279","value_name":"Garant\u00eda de f\u00e1brica","value_struct":null},{"id":"WARRANTY_TIME","name":"Tiempo de garant\u00eda","value_id":null,"value_name":"90 d\u00edas","value_struct":{"number":90,"unit":"d\u00edas"}}],"buying_mode":"buy_it_now","listing_type_id":"gold_special","start_time":"2019-05-15T18:52:18.741Z","stop_time":"2039-05-10T04:00:00.000Z","end_time":"2039-05-10T04:00:00.000Z","expiration_time":"2019-08-03T18:52:18.910Z","condition":"new","permalink":"http:\/\/articulo.mercadolibre.com.ar\/MLA-786631694-prueba-no-ofertar--_JM","pictures":[{"id":"845835-MLA30550030484_052019","url":"http:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","secure_url":"https:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","size":"500x500","max_size":"500x500","quality":""}],"video_id":"YOUTUBE_ID_HERE","descriptions":[],"accepts_mercadopago":true,"non_mercado_pago_payment_methods":[],"shipping":{"mode":"not_specified","local_pick_up":false,"free_shipping":false,"methods":[],"dimensions":null,"tags":[],"logistic_type":"not_specified","store_pick_up":false},"international_delivery_mode":"none","seller_address":{"id":14693980,"comment":"","address_line":"San Martin 1333","zip_code":"1814","city":{"id":"TUxBQ0NBTjk4NTM","name":"Ca\u00f1uelas"},"state":{"id":"AR-B","name":"Buenos Aires"},"country":{"id":"AR","name":"Argentina"},"latitude":-35.0476913,"longitude":-58.752713,"search_location":{"neighborhood":{"id":"TUxBQkNB0Tg1Nzda","name":"Ca\u00f1uelas"},"city":{"id":"TUxBQ0NBTjk4NTM","name":"Ca\u00f1uelas"},"state":{"id":"TUxBUFpPTmFpbnRl","name":"Buenos Aires Interior"}}},"seller_contact":null,"location":{},"geolocation":{"latitude":-35.0476913,"longitude":-58.752713},"coverage_areas":[],"attributes":[{"id":"BRAND","name":"Marca","value_id":"2786327","value_name":"Piccadilly","value_struct":null,"attribute_group_id":"MAIN","attribute_group_name":"Principales"},{"id":"ITEM_CONDITION","name":"Condici\u00f3n del \u00edtem","value_id":"2230284","value_name":"Nuevo","value_struct":null,"attribute_group_id":"OTHERS","attribute_group_name":"Otros"},{"id":"COLOR","name":"Color","value_id":"52049","value_name":"Negro","value_struct":null,"attribute_group_id":"OTHERS","attribute_group_name":"Otros"},{"id":"SIZE","name":"Talle","value_id":"3259454","value_name":"44","value_struct":null,"attribute_group_id":"OTHERS","attribute_group_name":"Otros"},{"id":"GENDER","name":"G\u00e9nero","value_id":"339665","value_name":"Mujer","value_struct":null,"attribute_group_id":"OTHERS","attribute_group_name":"Otros"}],"warnings":[],"listing_source":"","variations":[],"thumbnail":"http:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=I&f=proccesing_image_es.jpg","secure_thumbnail":"https:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=I&f=proccesing_image_es.jpg","status":"active","sub_status":[],"tags":["immediate_payment"],"warranty":"Garant\u00eda de f\u00e1brica: 90 d\u00edas","catalog_product_id":null,"domain_id":"MLA-FOOTWEAR","seller_custom_field":null,"parent_item_id":null,"differential_pricing":null,"deal_ids":[],"automatic_relist":false,"date_created":"2019-05-15T18:52:19.056Z","last_updated":"2019-05-15T18:52:19.056Z","health":null,"catalog_listing":false,"item_relations":[]},"httpCode":201}
  */



    // Formato del JSON que se envía a Meli //
   /*{
  "title": "Chinelo Havaianas Feminino Slim Strapped Preto TEST",
  "price": 8000,
  "available_quantity": 11,
  "listing_type_id": "bronze",
  "description": {
    "plain_text": "A Havaianas Slim Strapped traz a novidade de estampa floral na tira, logo metálico colorido e a base lisa em três opções: a preta clássica e duas coloridas. Essa combinação é perfeita para quem é básico, mas quer dar um toque de estilo no visual."
  },
  "pictures": [
    {
      "source": "http://localhost:8888/img/products/1000x1000/1551983826-16469311055c8164d2826c33-89958635.jpg"
    },
    {
      "source": "http://localhost:8888/img/products/1000x1000/1551983834-3032974025c8164daa16a60-19134316.jpg"
    },
    {
      "source": "http://localhost:8888/img/products/1000x1000/1551983835-9707405845c8164db1b6549-32330505.jpg"
    },
    {
      "source": "http://localhost:8888/img/products/1000x1000/1551983835-15858453885c8164db9541f0-95756213.jpg"
    }
  ],
  "variations": [
    {
      "price": 8000,
      "available_quantity": 1,
      "attribute_combinations": [
        {
          "id": "COLOR",
          "value_id": null,
          "value_name": "Preto"
        },
        {
          "id": "SIZE",
          "value_id": null,
          "value_name": "34"
        }
      ],
      "attributes": [
        {
          "id": "MAIN_COLOR",
          "value_id": "2450295",
          "value_name": "Preto"
        },
        {
          "id": "GTIN",
          "value_id": "7890541339638",
          "value_name": "7890541339638"
        }
      ],
      "picture_ids": [
        "http://localhost:8888/img/products/1000x1000/1551983826-16469311055c8164d2826c33-89958635.jpg",
        "http://localhost:8888/img/products/1000x1000/1551983834-3032974025c8164daa16a60-19134316.jpg",
        "http://localhost:8888/img/products/1000x1000/1551983835-9707405845c8164db1b6549-32330505.jpg",
        "http://localhost:8888/img/products/1000x1000/1551983835-15858453885c8164db9541f0-95756213.jpg"
      ],
      "id": 34008669044
    },
    {
      "price": 8000,
      "available_quantity": 3,
      "attribute_combinations": [
        {
          "id": "COLOR",
          "value_id": null,
          "value_name": "Preto"
        },
        {
          "id": "SIZE",
          "value_id": null,
          "value_name": "36"
        }
      ],
      "attributes": [
        {
          "id": "MAIN_COLOR",
          "value_id": "2450295",
          "value_name": "Preto"
        },
        {
          "id": "GTIN",
          "value_id": "7891224957453",
          "value_name": "7891224957453"
        }
      ],
      "picture_ids": [
        "http://localhost:8888/img/products/1000x1000/1551983826-16469311055c8164d2826c33-89958635.jpg",
        "http://localhost:8888/img/products/1000x1000/1551983834-3032974025c8164daa16a60-19134316.jpg",
        "http://localhost:8888/img/products/1000x1000/1551983835-9707405845c8164db1b6549-32330505.jpg",
        "http://localhost:8888/img/products/1000x1000/1551983835-15858453885c8164db9541f0-95756213.jpg"
      ],
      "id": 34008669059
    },
    {
      "price": 8000,
      "available_quantity": 5,
      "attribute_combinations": [
        {
          "id": "COLOR",
          "value_id": null,
          "value_name": "Preto"
        },
        {
          "id": "SIZE",
          "value_id": null,
          "value_name": "38"
        }
      ],
      "attributes": [
        {
          "id": "MAIN_COLOR",
          "value_id": "2450295",
          "value_name": "Preto"
        },
        {
          "id": "GTIN",
          "value_id": "7891224957460",
          "value_name": "7891224957460"
        }
      ],
      "picture_ids": [
        "http://localhost:8888/img/products/1000x1000/1551983826-16469311055c8164d2826c33-89958635.jpg",
        "http://localhost:8888/img/products/1000x1000/1551983834-3032974025c8164daa16a60-19134316.jpg",
        "http://localhost:8888/img/products/1000x1000/1551983835-9707405845c8164db1b6549-32330505.jpg",
        "http://localhost:8888/img/products/1000x1000/1551983835-15858453885c8164db9541f0-95756213.jpg"
      ],
      "id": 34008669071
    },
    {
      "price": 8000,
      "available_quantity": 2,
      "attribute_combinations": [
        {
          "id": "COLOR",
          "value_id": null,
          "value_name": "Preto"
        },
        {
          "id": "SIZE",
          "value_id": null,
          "value_name": "40"
        }
      ],
      "attributes": [
        {
          "id": "MAIN_COLOR",
          "value_id": "2450295",
          "value_name": "Preto"
        },
        {
          "id": "GTIN",
          "value_id": "7891224957477",
          "value_name": "7891224957477"
        }
      ],
      "picture_ids": [
        "http://localhost:8888/img/products/1000x1000/1551983826-16469311055c8164d2826c33-89958635.jpg",
        "http://localhost:8888/img/products/1000x1000/1551983834-3032974025c8164daa16a60-19134316.jpg",
        "http://localhost:8888/img/products/1000x1000/1551983835-9707405845c8164db1b6549-32330505.jpg",
        "http://localhost:8888/img/products/1000x1000/1551983835-15858453885c8164db9541f0-95756213.jpg"
      ],
      "id": 34008669085
    }
  ],
  "attributes": [
    {
      "id": "MODEL",
      "value_name": "Slim strappede"
    },
    {
      "id": "HEEL_TYPE",
      "value_id": "994260",
    },
    {
      "id": "RELEASE_YEAR",
      "value_name": "2019"
    },
    {
      "id": "FABRIC_DESIGN",
      "value_id": "508602",
    },
    {
      "id": "FOOTWEAR_STYLE",
      "value_id": "1006227",
    },
    {
      "id": "RELEASE_SEASON",
      "value_id": "994283",
    },
    {
      "id": "OUTSOLE_MATERIAL",
      "value_id": "930364",
    },
    {
      "id": "FOOTWEAR_MATERIAL",
      "value_id": "3993038",
    }
  ],
  "shipping": {
    "mode": "me2",
    "local_pick_up": false,
    "free_shipping": false,
    "free_methods": [],
    "dimensions": null,
    "tags": []
  },
  "status": "active"
}*/
   

/* 
  Sólo Variaciones
[
   {
    "id": 13061434112,
    "attribute_combinations": [
      {
        "id": "11000",
        "name": "Color Primario",
        "value_id": "11000-VioletaOscuro",
        "value_name": "Violeta oscuro"
      },
      {
        "id": "10000",
        "name": "Talle",
        "value_id": "873edff",
        "value_name": "32"
      }
    ],
    "price": 500,
    "available_quantity": 10,
    "sold_quantity": 0,
    "picture_ids": [
      "658905-MLM25103388111_102016"
    ],
    "seller_custom_field": "597",
    "catalog_product_id": null
  },
  {
    "id": 13061434127,
    "attribute_combinations": [
      {
        "id": "11000",
        "name": "Color Primario",
        "value_id": "11000-Salmon",
        "value_name": "Salmon"
      },
      {
        "id": "10000",
        "name": "Talle",
        "value_id": "c4b8f6b",
        "value_name": "36"
      }
    ],
    "price": 500,
    "available_quantity": 10,
    "sold_quantity": 0,
    "picture_ids": [
      "110015-MLM25103388110_102016"
    ],
    "seller_custom_field": "602",
    "catalog_product_id": null
  },
  {
    "id": 13061434130,
    "attribute_combinations": [
      {
        "id": "11000",
        "name": "Color Primario",
        "value_id": "11000-FucsiaOscuro",
        "value_name": "Fucsia oscuro"
      },
      {
        "id": "10000",
        "name": "Talle",
        "value_id": "c4b8f6b",
        "value_name": "36"
      }
    ],
    "price": 500,
    "available_quantity": 10,
    "sold_quantity": 0,
    "picture_ids": [
      "110015-MLM25103388110_102016"
    ],
    "seller_custom_field": "603",
    "catalog_product_id": null
  },
  {
    "id": 13061434106,
    "attribute_combinations": [
      {
        "id": "11000",
        "name": "Color Primario",
        "value_id": "11000-AzulCielo",
        "value_name": "Azul cielo"
      },
      {
        "id": "10000",
        "name": "Talle",
        "value_id": "380075a",
        "value_name": "32"
      }
    ],
    "price": 500,
    "available_quantity": 10,
    "sold_quantity": 0,
    "picture_ids": [
      "142015-MLM25103388113_102016"
    ],
    "seller_custom_field": "595",
    "catalog_product_id": null
  },
  {
    "id": 13061434109,
    "attribute_combinations": [
      {
        "id": "11000",
        "name": "Color Primario",
        "value_id": "11000-AzulPetroleo",
        "value_name": "Azul petroleo"
      },
      {
        "id": "10000",
        "name": "Talle",
        "value_id": "873edff",
        "value_name": "32"
      }
    ],
    "price": 500,
    "available_quantity": 10,
    "sold_quantity": 0,
    "picture_ids": [
      "266905-MLM25103388112_102016"
    ],
    "seller_custom_field": "596",
    "catalog_product_id": null
  },
  {
    "id": 13061434118,
    "attribute_combinations": [
      {
        "id": "11000",
        "name": "Color Primario",
        "value_id": "11000-Plateado",
        "value_name": "Plateado"
      },
      {
        "id": "10000",
        "name": "Talle",
        "value_id": "da934b5",
        "value_name": "34"
      }
    ],
    "price": 500,
    "available_quantity": 10,
    "sold_quantity": 0,
    "picture_ids": [
      "110015-MLM25103388110_102016"
    ],
    "seller_custom_field": "599",
    "catalog_product_id": null
  },
  {
    "id": 13061434124,
    "attribute_combinations": [
      {
        "id": "11000",
        "name": "Color Primario",
        "value_id": "11000-Terracota",
        "value_name": "Terracota"
      },
      {
        "id": "10000",
        "name": "Talle",
        "value_id": "c4b8f6b",
        "value_name": "36"
      }
    ],
    "price": 500,
    "available_quantity": 10,
    "sold_quantity": 0,
    "picture_ids": [
      "110015-MLM25103388110_102016"
    ],
    "seller_custom_field": "601",
    "catalog_product_id": null
  },
  {
    "id": 13061434115,
    "attribute_combinations": [
      {
        "id": "11000",
        "name": "Color Primario",
        "value_id": "11000-Agua",
        "value_name": "Agua"
      },
      {
        "id": "10000",
        "name": "Talle",
        "value_id": "380075a",
        "value_name": "34"
      }
    ],
    "price": 500,
    "available_quantity": 10,
    "sold_quantity": 0,
    "picture_ids": [
      "110015-MLM25103388110_102016"
    ],
    "seller_custom_field": "598",
    "catalog_product_id": null
  },
  {
    "id": 13061434103,
    "attribute_combinations": [
      {
        "id": "11000",
        "name": "Color Primario",
        "value_id": "11000-Negro",
        "value_name": "Negro"
      },
      {
        "id": "10000",
        "name": "Talle",
        "value_id": "380075a",
        "value_name": "32"
      }
    ],
    "price": 500,
    "available_quantity": 10,
    "sold_quantity": 0,
    "picture_ids": [
      "110015-MLM25103388110_102016"
    ],
    "seller_custom_field": "594",
    "catalog_product_id": null
  },
  {
    "id": 13061434121,
    "attribute_combinations": [
      {
        "id": "11000",
        "name": "Color Primario",
        "value_id": "11000-Rosa",
        "value_name": "Rosa"
      },
      {
        "id": "10000",
        "name": "Talle",
        "value_id": "da934b5",
        "value_name": "34"
      }
    ],
    "price": 500,
    "available_quantity": 10,
    "sold_quantity": 0,
    "picture_ids": [
      "110015-MLM25103388110_102016"
    ],
    "seller_custom_field": "600",
    "catalog_product_id": null
  }
] */
 
/**
 * RESPUESTA DE UNA SUBIDA CON CUATRO VARIACIONES
 *  {"body":{"id":"MLA788248069","site_id":"MLA","title":"Esto Es Una Prueba - No Ofertar |||\u00b0\u00b0|||","subtitle":null,"seller_id":1157128,"category_id":"MLA381790","official_store_id":null,"price":22,"base_price":22,"original_price":null,"inventory_id":null,"currency_id":"ARS","initial_quantity":23,"available_quantity":23,"sold_quantity":0,"sale_terms":[{"id":"WARRANTY_TYPE","name":"Tipo de garant\u00eda","value_id":"2230279","value_name":"Garant\u00eda de f\u00e1brica","value_struct":null},{"id":"WARRANTY_TIME","name":"Tiempo de garant\u00eda","value_id":null,"value_name":"90 d\u00edas","value_struct":{"number":90,"unit":"d\u00edas"}}],"buying_mode":"buy_it_now","listing_type_id":"gold_special","start_time":"2019-05-24T14:14:14.345Z","stop_time":"2039-05-19T04:00:00.000Z","end_time":"2039-05-19T04:00:00.000Z","expiration_time":"2019-08-12T14:14:14.541Z","condition":"new","permalink":"http:\/\/articulo.mercadolibre.com.ar\/MLA-788248069-esto-es-una-prueba-no-ofertar--_JM","pictures":[{"id":"855915-MLA30775746843_052019","url":"http:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","secure_url":"https:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","size":"500x500","max_size":"500x500","quality":""},{"id":"649252-MLA30775746842_052019","url":"http:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","secure_url":"https:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","size":"500x500","max_size":"500x500","quality":""},{"id":"758363-MLA30775746841_052019","url":"http:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","secure_url":"https:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","size":"500x500","max_size":"500x500","quality":""}],"video_id":null,"descriptions":[],"accepts_mercadopago":true,"non_mercado_pago_payment_methods":[],"shipping":{"mode":"not_specified","local_pick_up":false,"free_shipping":false,"methods":[],"dimensions":null,"tags":[],"logistic_type":"not_specified","store_pick_up":false},"international_delivery_mode":"none","seller_address":{"id":14693980,"comment":"","address_line":"San Martin 1333","zip_code":"1814","city":{"id":"TUxBQ0NBTjk4NTM","name":"Ca\u00f1uelas"},"state":{"id":"AR-B","name":"Buenos Aires"},"country":{"id":"AR","name":"Argentina"},"latitude":-35.0476913,"longitude":-58.752713,"search_location":{"neighborhood":{"id":"TUxBQkNB0Tg1Nzda","name":"Ca\u00f1uelas"},"city":{"id":"TUxBQ0NBTjk4NTM","name":"Ca\u00f1uelas"},"state":{"id":"TUxBUFpPTmFpbnRl","name":"Buenos Aires Interior"}}},"seller_contact":null,"location":{},"geolocation":{"latitude":-35.0476913,"longitude":-58.752713},"coverage_areas":[],"attributes":[{"id":"BRAND","name":"Marca","value_id":"2786327","value_name":"Piccadilly","value_struct":null,"attribute_group_id":"MAIN","attribute_group_name":"Principales"},{"id":"ITEM_CONDITION","name":"Condici\u00f3n del \u00edtem","value_id":"2230284","value_name":"Nuevo","value_struct":null,"attribute_group_id":"OTHERS","attribute_group_name":"Otros"},{"id":"GENDER","name":"G\u00e9nero","value_id":"339665","value_name":"Mujer","value_struct":null,"attribute_group_id":"OTHERS","attribute_group_name":"Otros"}],"warnings":[],"listing_source":"","variations":[{"id":37708001160,"attribute_combinations":[{"id":"COLOR","name":"Color","value_id":"52022","value_name":"Agua","value_struct":null},{"id":"SIZE","name":"Talle","value_id":"3189098","value_name":"18","value_struct":null}],"price":22,"available_quantity":10,"sold_quantity":0,"sale_terms":[],"picture_ids":["855915-MLA30775746843_052019","649252-MLA30775746842_052019","758363-MLA30775746841_052019"],"seller_custom_field":null,"catalog_product_id":null,"attributes":[],"inventory_id":null,"item_relations":[]},{"id":37708001163,"attribute_combinations":[{"id":"COLOR","name":"Color","value_id":"283160","value_name":"Turquesa","value_struct":null},{"id":"SIZE","name":"Talle","value_id":"3189099","value_name":"18.5","value_struct":null}],"price":22,"available_quantity":5,"sold_quantity":0,"sale_terms":[],"picture_ids":["855915-MLA30775746843_052019","649252-MLA30775746842_052019","758363-MLA30775746841_052019"],"seller_custom_field":null,"catalog_product_id":null,"attributes":[],"inventory_id":null,"item_relations":[]},{"id":37708001166,"attribute_combinations":[{"id":"COLOR","name":"Color","value_id":"283162","value_name":"\u00cdndigo","value_struct":null},{"id":"SIZE","name":"Talle","value_id":"3189100","value_name":"19","value_struct":null}],"price":22,"available_quantity":6,"sold_quantity":0,"sale_terms":[],"picture_ids":["855915-MLA30775746843_052019","649252-MLA30775746842_052019","758363-MLA30775746841_052019"],"seller_custom_field":null,"catalog_product_id":null,"attributes":[],"inventory_id":null,"item_relations":[]},{"id":37708001169,"attribute_combinations":[{"id":"COLOR","name":"Color","value_id":"52036","value_name":"Lavanda","value_struct":null},{"id":"SIZE","name":"Talle","value_id":"3189109","value_name":"23.5","value_struct":null}],"price":22,"available_quantity":2,"sold_quantity":0,"sale_terms":[],"picture_ids":["855915-MLA30775746843_052019","649252-MLA30775746842_052019","758363-MLA30775746841_052019"],"seller_custom_field":null,"catalog_product_id":null,"attributes":[],"inventory_id":null,"item_relations":[]}],"thumbnail":"http:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=I&f=proccesing_image_es.jpg","secure_thumbnail":"https:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=I&f=proccesing_image_es.jpg","status":"active","sub_status":[],"tags":["immediate_payment"],"warranty":"Garant\u00eda de f\u00e1brica: 90 d\u00edas","catalog_product_id":null,"domain_id":null,"seller_custom_field":null,"parent_item_id":null,"differential_pricing":null,"deal_ids":[],"automatic_relist":false,"date_created":"2019-05-24T14:14:14.762Z","last_updated":"2019-05-24T14:14:14.762Z","health":null,"catalog_listing":false,"item_relations":[]},"httpCode":201}
 */


 /**
  * RESPUESTA DE UNA SUBIDA CON UN SOLO PRODUCTO
  *  {"body":{"id":"MLA788251401","site_id":"MLA","title":"Otra Prueba - No Ofertar!!!!! ||\u00b0\u00b0\u00b0\u00b0||","subtitle":null,"seller_id":1157128,"category_id":"MLA381790","official_store_id":null,"price":22,"base_price":22,"original_price":null,"inventory_id":null,"currency_id":"ARS","initial_quantity":10,"available_quantity":10,"sold_quantity":0,"sale_terms":[{"id":"WARRANTY_TYPE","name":"Tipo de garant\u00eda","value_id":"2230279","value_name":"Garant\u00eda de f\u00e1brica","value_struct":null},{"id":"WARRANTY_TIME","name":"Tiempo de garant\u00eda","value_id":null,"value_name":"90 d\u00edas","value_struct":{"number":90,"unit":"d\u00edas"}}],"buying_mode":"buy_it_now","listing_type_id":"gold_special","start_time":"2019-05-24T14:37:21.625Z","stop_time":"2039-05-19T04:00:00.000Z","end_time":"2039-05-19T04:00:00.000Z","expiration_time":"2019-08-12T14:37:21.794Z","condition":"new","permalink":"http:\/\/articulo.mercadolibre.com.ar\/MLA-788251401-otra-prueba-no-ofertar--_JM","pictures":[{"id":"837764-MLA30776184524_052019","url":"http:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","secure_url":"https:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","size":"500x500","max_size":"500x500","quality":""},{"id":"887586-MLA30776184525_052019","url":"http:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","secure_url":"https:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","size":"500x500","max_size":"500x500","quality":""},{"id":"938819-MLA30776184526_052019","url":"http:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","secure_url":"https:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=O&f=proccesing_image_es.jpg","size":"500x500","max_size":"500x500","quality":""}],"video_id":null,"descriptions":[],"accepts_mercadopago":true,"non_mercado_pago_payment_methods":[],"shipping":{"mode":"not_specified","local_pick_up":false,"free_shipping":false,"methods":[],"dimensions":null,"tags":[],"logistic_type":"not_specified","store_pick_up":false},"international_delivery_mode":"none","seller_address":{"id":14693980,"comment":"","address_line":"San Martin 1333","zip_code":"1814","city":{"id":"TUxBQ0NBTjk4NTM","name":"Ca\u00f1uelas"},"state":{"id":"AR-B","name":"Buenos Aires"},"country":{"id":"AR","name":"Argentina"},"latitude":-35.0476913,"longitude":-58.752713,"search_location":{"neighborhood":{"id":"TUxBQkNB0Tg1Nzda","name":"Ca\u00f1uelas"},"city":{"id":"TUxBQ0NBTjk4NTM","name":"Ca\u00f1uelas"},"state":{"id":"TUxBUFpPTmFpbnRl","name":"Buenos Aires Interior"}}},"seller_contact":null,"location":{},"geolocation":{"latitude":-35.0476913,"longitude":-58.752713},"coverage_areas":[],"attributes":[{"id":"BRAND","name":"Marca","value_id":"2786327","value_name":"Piccadilly","value_struct":null,"attribute_group_id":"MAIN","attribute_group_name":"Principales"},{"id":"ITEM_CONDITION","name":"Condici\u00f3n del \u00edtem","value_id":"2230284","value_name":"Nuevo","value_struct":null,"attribute_group_id":"OTHERS","attribute_group_name":"Otros"},{"id":"GENDER","name":"G\u00e9nero","value_id":"339665","value_name":"Mujer","value_struct":null,"attribute_group_id":"OTHERS","attribute_group_name":"Otros"}],"warnings":[],"listing_source":"","variations":[{"id":37709209439,"attribute_combinations":[{"id":"COLOR","name":"Color","value_id":"52022","value_name":"Agua","value_struct":null},{"id":"SIZE","name":"Talle","value_id":"3189098","value_name":"18","value_struct":null}],"price":22,"available_quantity":10,"sold_quantity":0,"sale_terms":[],"picture_ids":["837764-MLA30776184524_052019","887586-MLA30776184525_052019","938819-MLA30776184526_052019"],"seller_custom_field":null,"catalog_product_id":null,"attributes":[],"inventory_id":null,"item_relations":[]}],"thumbnail":"http:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=I&f=proccesing_image_es.jpg","secure_thumbnail":"https:\/\/www.mercadolibre.com\/jm\/img?s=STC&v=I&f=proccesing_image_es.jpg","status":"active","sub_status":[],"tags":["immediate_payment"],"warranty":"Garant\u00eda de f\u00e1brica: 90 d\u00edas","catalog_product_id":null,"domain_id":null,"seller_custom_field":null,"parent_item_id":null,"differential_pricing":null,"deal_ids":[],"automatic_relist":false,"date_created":"2019-05-24T14:37:21.958Z","last_updated":"2019-05-24T14:37:21.958Z","health":null,"catalog_listing":false,"item_relations":[]},"httpCode":201}
  */