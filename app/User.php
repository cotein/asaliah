<?php

namespace App;

use Jenssegers\Date\Date;
use App\Src\Models\Company;
use App\Src\Role\RoleTrait;
use App\Src\Models\TypeUser;
use App\Src\Models\MeliToken;
use App\Src\Models\Commission;
use Spatie\MediaLibrary\Media;
use App\Src\Models\SaleInvoice;
use App\Src\Models\PedidoCliente;
use App\Src\Role\HasRolesContract;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class User extends Authenticatable implements HasMediaConversions, HasRolesContract
{
    use Notifiable, HasApiTokens, SoftDeletes, HasMediaTrait, RoleTrait;

    public function __construct()
    {
        Date::setLocale('es');

    }

    protected $guarded = [];
    
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email', 'password', 'active', 'activation_token', 'refresh_token_mercadolibre',
    ];

    protected $hidden = [
        'password', 'remember_token', 'activation_token', 'refresh_token_mercadolibre',
    ];

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class, 'id', 'commission_id');
    }

    public function sale_invoices()
    {
        return $this->hasMany(SaleInvoice::class);
    }

    public function pedido_clientes()
    {
        return $this->hasMany(PedidoCliente::class);
    }

    public function saveToken($token)
    {
        $this->token = $token;
        $this->save();

        return $this;
    }
    
    public function revokeToken()
    {
        $this->token = null;

        $this->save();
    }

    public function revokeMeliToken()
    {   
        if ($this->company->mercadoLibre()->exists()) {

            $this->company->mercadoLibre->update(['meli_token' => null]);
            $this->company->mercadoLibre->update(['meli_refresh_token' => null]);
            $this->company->mercadoLibre->update(['meli_token_expiration_time' => null]);
        }
    }

    //---AVATAR---//
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
             ->setManipulations(['w' => 36, 'h' => 36])
             ->performOnCollections('avatar');
    }

    public function addDefaultAvatar()
    {
        $this->addMedia(public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'user-default.png')
                ->preservingOriginal()
                ->toMediaCollection('avatar');
    }
    
    public function updateAvatar($request)
    {
        $this->clearMediaCollection('avatar');
        
        $this->addMediaFromRequest('file')->toMediaCollection('avatar');

        $this->thumb = $this->getMedia('avatar')->first()->getUrl('thumb');

        $this->image = $this->getMedia('avatar')->first()->getUrl();

        $this->save();

        return $this;
    }

    public function updateDataFromMeli($meli_user)
    {

        if ($this->company->mercadoLibre()->exists()) {

            $this->company->mercadoLibre->update(['meli_token' => $meli_user['access_token']]);
            $this->company->mercadoLibre->update(['meli_user_id' => $meli_user['user_id']]);
            $this->company->mercadoLibre->update(['meli_refresh_token' => $meli_user['refresh_token']]);
            $this->company->mercadoLibre->update(['meli_token_expiration_time' => $this->expiration_time($meli_user['expires_in'])]);
            $this->company->mercadoLibre->update(['active' => 1]);
            return $this;

        }else{

            $meli = new MeliToken;
            $meli->company_id = $this->company_id;
            $meli->meli_token = $meli_user['access_token'];
            $meli->meli_user_id = $meli_user['user_id'];
            $meli->meli_refresh_token = $meli_user['refresh_token'];
            $meli->meli_token_expiration_time = $this->expiration_time($meli_user['expires_in']);
            $meli->active = 1;
            $meli->save();

            return $this;
        }

    }

   /*  public function updateDataWithRefreshToken($data)
    {
        $this->company->mercadoLibre->update(['meli_token' => $data->access_token]);
        $this->company->mercadoLibre->update(['meli_refresh_token' => $data->refresh_token]);
        $this->company->mercadoLibre->update(['meli_token_expiration_time' => $this->expiration_time($meli_user['expires_in'])]);

        return $this;
    } */

    public function expiration_time($seconds)
    {
        $d = Date::now()->addSeconds(21600); 

        return $d->toDateTimeString();
    }

    public function verify_expiration_time_token()
    {
        if (is_null($this->company->mercadoLibre->meli_token_expiration_time)) {
            return false;
        }

        $ahora = Date::now();

        $vence = Date::createFromFormat('Y-m-d H:i:s', $this->company->mercadoLibre->meli_token_expiration_time);
        
        if($ahora->greaterThan($vence))
        {
            /** mandar refresh token */
            return true;
        }

        return false;
    }

    public function has_token()
    {
        //dd($this->company->mercadoLibre);
        if (empty($this->company->mercadoLibre->meli_token) || is_null($this->company->mercadoLibre->meli_token)) {
            return false;
        }

        return true;
    }

    public function meli_fields_clean()
    {
        $this->company->mercadoLibre->meli_user_id = NULL;
        $this->company->mercadoLibre->meli_token = NULL;
        $this->company->mercadoLibre->meli_refresh_token = NULL;
        $this->company->mercadoLibre->meli_token_expiration_time = NULL;

        $this->save();

        return $this;
    }

    public function rol()
    {
        return $this->hasOne(TypeUser::class, 'id', 'type_user_id');
    }

    public function hasCompany()
    {
        if (! is_null($this->company_id)) {
            return true;
        }

        return false;
    }

    public function name()
    {
        $name = null;

        if ($this->name) {
            $name = $this->name . ' ';
        }

        if ($this->last_name) {
            $name = $name . $this->last_name;
        }
        
        return strtoupper($name);
    }

}
