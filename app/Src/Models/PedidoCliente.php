<?php

namespace App\Src\Models;

use App\User;
use App\Src\Models\Status;
use App\Src\Models\Comment;
use App\Src\Models\Customer;
use App\Src\Models\Commission;
use App\Src\Models\PaymentType;
use App\Src\Traits\StatusTrait;
use App\Src\Models\WebHookMessages;
use App\Src\Models\PedidoClienteItem;
use App\Src\Contracts\StatusInterface;
use Illuminate\Database\Eloquent\Model;
use App\Src\Models\PedidoClienteAddress;

class PedidoCliente extends Model implements StatusInterface
{
    use StatusTrait;
    
    protected $guarded = [];

    protected $table = 'pedidos_clientes';

    protected $casts = [
        'geocoder' => 'array',
        'meli_data' => 'array'
    ];

    public function items()
    {
        return $this->hasMany(PedidoClienteItem::class, 'pedido_cliente_id', 'id');
    }     

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function statuses()
    {
        return $this->hasMany(PedidoClienteStatus::class, 'pedido_cliente_id', 'id');
    }

    public function address()
    {
        return $this->hasOne(PedidoClienteAddress::class, 'pedido_cliente_id', 'id');
    }
    
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(WebHookMessages::class, 'resource_id', 'meli_id')->orderBy('date');
    }
    
    public function commission()
    {
        return $this->hasOne(Commission::class, 'commission_id', 'id');
    }

    public function payment_type()
    {
        return $this->hasOne(PaymentType::class, 'id', 'pay_method');
    }

    public function base_imponible()
    {
        return $this->items->sum(function($i){
            return $i->quantity * $i->unit_price;
        });    
    }

    public function come_from_meli()
    {
        if (is_null($this->meli_id)) {
            return false;
        }
        return true;
    }
}
