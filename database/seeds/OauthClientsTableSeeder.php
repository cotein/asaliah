<?php

use Illuminate\Database\Seeder;

class OauthClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('oauth_clients')->delete();
        
        \DB::table('oauth_clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => NULL,
                'name' => 'Servidor de Test Personal Access Client',
                'secret' => '4VJqmvHbKFVJYcZo5sEBr0yBiYIXxnQNIn9kWeB7',
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2021-04-03 12:09:47',
                'updated_at' => '2021-04-03 12:09:47',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => NULL,
                'name' => 'Servidor de Test Password Grant Client',
                'secret' => 'EzIH4lqIYZRuQaNIlA7gBiaSTz9IthKpsObllcXl',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2021-04-03 12:09:47',
                'updated_at' => '2021-04-03 12:09:47',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => NULL,
                'name' => 'Servidor de Test Personal Access Client',
                'secret' => 'xw1UrtxmkF2BhRI1qQJmBdOcL7B9sPMbjpklslEL',
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2021-04-08 01:31:48',
                'updated_at' => '2021-04-08 01:31:48',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => NULL,
                'name' => 'Servidor de Test Password Grant Client',
                'secret' => 'gIYaRyaJWhKtpV48fhXsuwIVel2b0bpuDtKeaxB1',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2021-04-08 01:31:48',
                'updated_at' => '2021-04-08 01:31:48',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => NULL,
                'name' => 'Servidor de Test Personal Access Client',
                'secret' => 'f7l7783gQ9yNhL3cVQ7Ui84yS19gWVywxrd4L4dj',
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2021-04-12 12:48:16',
                'updated_at' => '2021-04-12 12:48:16',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => NULL,
                'name' => 'Servidor de Test Password Grant Client',
                'secret' => '6tkm5KKM2pJ2cGl7U94buHgIihpQTFivnpe7ydfa',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2021-04-12 12:48:16',
                'updated_at' => '2021-04-12 12:48:16',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => NULL,
                'name' => 'Servidor de Prueba Personal Access Client',
                'secret' => 'o4jgF1ejUg4So0ElmeZkMTHfgexqJsrgZz5Zw8tw',
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2021-04-13 16:25:57',
                'updated_at' => '2021-04-13 16:25:57',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => NULL,
                'name' => 'Servidor de Prueba Password Grant Client',
                'secret' => '0CnC4m28mbwKC2OcDzBXJV5pSbyJ0tjyczrd0nyX',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2021-04-13 16:25:57',
                'updated_at' => '2021-04-13 16:25:57',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => NULL,
                'name' => 'Laravel Personal Access Client',
                'secret' => 'd5zeuUx7D8dslTmLAZn46isKsCicZCt4DssWIaOT',
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2021-04-18 17:13:53',
                'updated_at' => '2021-04-18 17:13:53',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => NULL,
                'name' => 'Laravel Password Grant Client',
                'secret' => 'ebYisLuBDongtOHHWquaw4DUkUhhDLRol2WyVXhW',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2021-04-18 17:13:53',
                'updated_at' => '2021-04-18 17:13:53',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => NULL,
                'name' => 'Laravel Personal Access Client',
                'secret' => 'WM6BsR4qofHqwkipxbZIVqe3yWhW3pmVsdaySTZc',
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2021-05-13 16:03:58',
                'updated_at' => '2021-05-13 16:03:58',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => NULL,
                'name' => 'Laravel Password Grant Client',
                'secret' => 'QOvsGkvhYG4UdUMOe9yyxFZUdvrpiwBWn3vnxnHZ',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2021-05-13 16:03:58',
                'updated_at' => '2021-05-13 16:03:58',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => NULL,
                'name' => 'Servidor de Pruebas Personal Access Client',
                'secret' => 'AjYfGo2CtWUyYylyJ4EoFWxsivC9BFrDkcG7sb5B',
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2021-05-14 18:56:43',
                'updated_at' => '2021-05-14 18:56:43',
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => NULL,
                'name' => 'Servidor de Pruebas Password Grant Client',
                'secret' => '6emyBbJ0hKnDlS1jfxNBLjPLqctkXgbHxKH3Bqtk',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2021-05-14 18:56:43',
                'updated_at' => '2021-05-14 18:56:43',
            ),
        ));
        
        
    }
}