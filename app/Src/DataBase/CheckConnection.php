<?php

namespace App\Src\DataBase;

use Illuminate\Support\Facades\DB;

class CheckConnection
{

    const MYSQL = 'mysql2';

    public function hasConnectionWithMsql2()
    {
        try {
            //$db =  \DB::connection()->getPdo();
            //$database_name =  \DB::connection()->getDatabaseName();
            $mysql2 = \DB::connection(self::MYSQL);

            return true;

        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getMysql2connectionString()
    {
        return self::MYSQL;
    }
   
}
