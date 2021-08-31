<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'DIEGO',
                'last_name' => NULL,
                'email' => 'diego@diego.com',
                'password' => '$2y$10$KM3JdffEFGOU7nSB9j8GYOcTEnGL3p1rkIzQb40Y9YQRdBFoLGwR2',
                'active' => 1,
                'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijk1ZGI5ZjJkOWI4OTgxM2UzY2FhYTQwMzY2MjE0Y2IxM2JlMDJhMWYzNDJjZjlhNDc0ZjJjODBiZmQ3YWJjY2JjMTQyZmY5M2E5YzNjYmUzIn0.eyJhdWQiOiIxMyIsImp0aSI6Ijk1ZGI5ZjJkOWI4OTgxM2UzY2FhYTQwMzY2MjE0Y2IxM2JlMDJhMWYzNDJjZjlhNDc0ZjJjODBiZmQ3YWJjY2JjMTQyZmY5M2E5YzNjYmUzIiwiaWF0IjoxNjI1NzY0MzI5LCJuYmYiOjE2MjU3NjQzMjksImV4cCI6MTY1NzMwMDMyOSwic3ViIjoiMSIsInNjb3BlcyI6W119.C8XRXbN5vX_Ckcn8GIOw7y_5JXgHoMF6njDFwBo6rY9dsswYwdoUA5Zz3DQ7sBKSaGGk5fTw1g-AaxqZwHIKJCZRxSteKJ9AJ47DBnXz0NSpJXbJsvYGZy-GTJyTUXLGJrjZOntHm0kmGoz8y5_amKhmeA_cHEgH--NoDNIXVSO-JKXqaGcTJnNmXlZvECkTOjz1C-OUHluMBzm0y8Lii1lk_edLPU5dfkTxY0MK2dDkI_yti2i9fdz_PBIOsEjSdeKT1h_Oa9WVoZcvTTGWMjMhvJaWfHNrsl0K7rTxE1UvRd7b7mLcC1phjFp--ztQFBvpcTLcmXx6NMSfwtntLA8GK5meDtoTGEehINY218vBiQPtPxVSi1HiyksqATjsdLzRB1DSwOLHwgYUjZqleMDXS1d_jNzUFJTPyhK8hp9AxNnX7QErQfalavNCtJ41vMOXNvTINo0VG4BEInhPomydAntG_coXlzpOQ_cO3kx_l7OvNKhgxw4oiiqGvv436YIpV9XvIs8sHlkOXHEyUXiSUpSYWBWp5DLVbYDeRoyGvRlCWzDZDwovoeUHQrL_u77RXPyEJzGOSW0L720plFtdk7pWlboDgnrJobiPUTWyKRXAo0iZvQRRxX_aqE2z05O4B96SaC6uPRA3PatGmiomJ1XhJpfunXQuVfQ0iIg',
                'refresh_token' => NULL,
                'activation_token' => NULL,
                'token_type' => 'bearer',
                'meli_token' => '',
                'meli_refresh_token' => '',
                'meli_token_expiration_time' => '',
                'meli_scope' => NULL,
                'meli_token_type' => 'bearer',
                'meli_user_id' => NULL,
                'type_user_id' => 1,
                'company_id' => 1,
                'remember_token' => 'r35k8rNtEgEGtVNRnFbKT0jP90RNaQv96LBjvgd3IZKlB3B9snuCbOUaztOA',
                'created_at' => '2021-03-11 14:12:38',
                'updated_at' => '2021-07-08 17:12:09',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'MARCELO',
                'last_name' => NULL,
                'email' => 'marcelo.callao@piamondsa.com.ar',
                'password' => '$2y$10$S.wa4.VWwrciV2LoiAnrn.OfJNEbGb/Ek.Vyqn5OKc0lhyidqEB7u',
                'active' => 0,
                'token' => NULL,
                'refresh_token' => NULL,
                'activation_token' => NULL,
                'token_type' => 'bearer',
                'meli_token' => '',
                'meli_refresh_token' => '',
                'meli_token_expiration_time' => '',
                'meli_scope' => NULL,
                'meli_token_type' => 'bearer',
                'meli_user_id' => NULL,
                'type_user_id' => 1,
                'company_id' => 1,
                'remember_token' => '32HSWqupZBx11XR4cTLZZnUUft9yZfufxm417YxivuVUR25Bp3zhpBPXOn2n',
                'created_at' => '2021-05-14 12:29:00',
                'updated_at' => '2021-05-14 12:29:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}