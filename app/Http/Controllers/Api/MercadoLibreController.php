<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Src\Meli\MeliProductos;
use App\Http\Controllers\Controller;

class MercadoLibreController extends Controller
{
    /**
     * Comprador
     * id	419774369
     *nickname	"TT794313"
     *password	"qatest9222"
     *site_status	"active"
     *email	"test_user_32881012@testuser.com"
     *
     * 
     * +refresh_token: "TG-5c992e09a8f1e90006c0d7fc-419774369"
     * #expired_in: 21600
     * +expires_at: 1553564266
     * +token: "APP_USR-4900142289197649-032515-8c5aa2c50fbe76fcb8fe5b25a704adae-419774369"
     * +id: 419774369
     * +nickname: "TT794313"
     * +name: "Test Test"
     * +email: "test_user_32881012@testuser.com"
     * +avatar: null
     */

    /**
     * Vendedor
     * id	419778557
     *nickname	"TETE7122103"
     *password	"qatest3253"
     *site_status	"active"
     *email	"test_user_46453805@testuser.com"
     */


    protected $meliProductos;

    public function __construct()
    {
        $this->meliProductos = new MeliProductos;
    }

    public function user_me()
    {
        return $this->meliProductos->user_me();
    }

    public function item()
    {
        return $this->meliProductos->item();
    }

    public function create_test_user()
    {
        return $this->meliProductos->get_categories();
    }

    public function syncro()
    {
        return $this->meliProductos->syncro_meli_account();
    }

}
