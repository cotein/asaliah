<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Src\Models\Commission;
use App\Http\Controllers\Controller;
use App\Src\DataBase\CheckConnection;
use App\Transformers\User\UserTransformer;
use App\Transformers\User\CommissionsTransformer;

class UserController extends Controller
{
    private $commissions_mysql2 = null;

    public function my_commissions()
    {
        $comms = Commission::where('user_id', auth()->user()->id)->get();

        $connection = new CheckConnection;

        if ($connection->hasConnectionWithMsql2()) {

            $this->commissions_mysql2 = Commission::on($connection->getMysql2connectionString())->where('user_id', auth()->user()->id)->get();

        }

        if ($comms->isNotEmpty() && !is_null($this->commissions_mysql2)) {
            
            $comms = $comms->merge($this->commissions_mysql2);
        }

        if ($comms->isNotEmpty() && is_null($this->commissions_mysql2)) {
            
            $comms = $comms;
        }

        if (! $comms->isNotEmpty() && !is_null($this->commissions_mysql2)) {
            
            $comms = $this->commissions_mysql2;
        }

        $commissions = fractal($comms, new CommissionsTransformer())->toArray()['data'];
        
        return response()->json($commissions, 200);
    }

    public function rol_update()
    {
        if (request()->user_id == auth()->user()->id) {
            throw new \Exception('Un usuario no puede editarse a si mismo su categoria');
        }

        $user = User::find(request()->user_id);
        $user->type_user_id = request()->new_rol['id'];
        $user->save();

        return response()->json($user, 200);

    }

    public function active()
    {
        if (request()->user_id == auth()->user()->id) {
            throw new \Exception('Un no puede activarse a si mismo');
        }

        $user = User::find(request()->user_id);
        $user->active = request()->active;
        $user->save();

        $user = fractal($user, new UserTransformer())->toArray()['data'];

        return response()->json($user, 200);

    }

    
}
