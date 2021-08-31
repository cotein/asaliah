<?php 
namespace App\Src\Meli;

use GuzzleHttp\Client;
use Jenssegers\Date\Date;
use App\Src\Traits\ErrorTrait;
use App\Src\Meli\Sdk\lib\Api\OAuth20Api;
use Kolovious\MeliSocialite\Facade\Meli;
use Laravel\Socialite\Facades\Socialite;

abstract class MiMeli 
{
    use ErrorTrait;
    
    protected $site = 'MLA';

    protected $auth_user;

    protected $meli_token;
    
    /**
     * Retorna los datos OAuth2 desde MercadoLibre
     * $is_refresh_token controla si se envía el code
     * para obtener token por primera vez o si es 
     * refresh token.
     * 
     * @param $code token
     * @param $is_refresh_token boll
     */
    public function getToken($code_or_refresh_token, $is_refresh_token = false)
    {
        $apiInstance = new OAuth20Api(
            // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
            // This is optional, `GuzzleHtcallback?code=TG-606a5985ad058a000828a944-438749068tp\Client` will be used as default.
            new Client()
        );

        if ($is_refresh_token) {

            $code = null; // The parameter CODE

            $refresh_token = $code_or_refresh_token; // Your refresh_token

            $grant_type = 'refresh_token';

            $redirect_uri = null; // Your redirect_uri

        }else{

            $code = $code_or_refresh_token; // The parameter CODE
            
            $refresh_token = null; // Your refresh_token
            
            $grant_type = 'authorization_code';

            $redirect_uri = env('MELI_REDIRECT') ; // Your redirect_uri
        }

        $client_id = env('MELI_CLIENT_ID'); // Your client_id

        $client_secret = env('MELI_SECRET');

        try {
            //dd($grant_type, $client_id, $client_secret, $redirect_uri, $code, $refresh_token);
            $result = $apiInstance->getToken($grant_type, $client_id, $client_secret, $redirect_uri, $code, $refresh_token);
           
            return $result;

        } catch (\Exception $e) {
            
            \Log::error('##########################################################################');
            \Log::error($e->getMessage());
            \Log::error($grant_type . ' - ' . $client_id . ' - ' . $client_secret . ' - ' . $redirect_uri . ' - ' . $code . ' - ' . $refresh_token);
            \Log::error('##########################################################################');

            dd('Exception when calling OAuth20Api->getToken: en el catch ', $e->getMessage(), PHP_EOL);
        }
    }

    public function refresh_token($refresh_token)
    {
        $body = [
            'grant_type' => 'refresh_token', 
            'client_id' => config('services.meli.client_id'), 
            'client_secret' => config('services.meli.client_secret'),
            'refresh_token' => $refresh_token
        ];
        
        $result =  Meli::post('/oauth/token', $body);
        

        if($result['httpCode'] == 200)
        {
            return $result['body'];
        }

        return false;
    }

    public function execute_refresh_token()
    {
        Date::setLocale(config('app.locale'));
        
        $d = Date::createFromTimestamp(1554519835);
    }
}

