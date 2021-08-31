<?php

namespace App\Transformers\PedidoCliente;

use App\Src\Models\PedidoCliente;
use App\Src\Traits\DateFormatTrait;

use App\Src\Models\PedidoClienteStatus;
use League\Fractal\TransformerAbstract;
use App\Src\Traits\PedidoClientesTransformerTrait;

class PedidoClienteListTransformer extends TransformerAbstract
{
    use DateFormatTrait, PedidoClientesTransformerTrait;

    public function transform(PedidoCliente $pc)
    {
        return [
            'code' => $pc->code,
            'come_from_meli' => $pc->come_from_meli(),
            'comments' => $this->comments($pc),
            'created_on_meli' => (is_null($pc->meli_data)) ? $this->LongDateToArgentinaLongDate($pc->created_at) : $this->LongDateToArgentinaLongDate($pc->created_at),
            'customer' => strtoupper($pc->customer->name) . ' ' . strtoupper($pc->customer->meli_nick),
            'customer_DocTipo' => ($pc->customer->purchaserDocument()->exists()) ? $pc->customer->purchaserDocument->name : false,
            'customer_DocTipo_id' => ($pc->customer->purchaserDocument()->exists()) ? $pc->customer->purchaserDocument->id : false,
            'customer_DocTipo_afip_code' => ($pc->customer->purchaserDocument()->exists()) ? $pc->customer->purchaserDocument->afip_code : 'Falta definir',
            'customer_document_number' => $pc->customer->number,
            'customer_id' => $pc->customer->id,
            'customer_inscription_id' => $pc->customer->inscription_id,
            'customer_inscription_name' => ($pc->customer->inscription()->exists()) ? $pc->customer->inscription->name : 'Falta definir',
            'customer_addresses' =>  ($this->hasAddress($pc)) ? $this->addresses($pc->customer->addresses) : false,
            'customer_cellphone' => (is_null($pc->customer->cell_phone)) ? '' : $pc->customer->cell_phone,
            'customer_phone1' => (is_null($pc->customer->phone_1)) ? '' : $pc->customer->phone_1,
            'customer_phone2' => (is_null($pc->customer->phone_2)) ? '' : $pc->customer->phone_2,
            'customer_phone3' => (is_null($pc->customer->phone_3)) ? '' : $pc->customer->phone_3,
            'customer_nick_name' => $pc->customer->meli_nick,
            'customer_has_afip_data' => $pc->customer->has_afip_data,
            'customer_tipo_persona' => $pc->customer->datos_generales['tipoPersona'],
            'customer_type_id' => $pc->customer->type->id,
            'customer_type' => $pc->customer->type->name,
            'customer_contact' => $pc->customer->contact,
            'customer_accounting_account_child' => ($pc->customer->accounting_account_child()->exists()) ? $pc->customer->accounting_account_child->name : false,
            'date' => $this->ShortDateToArgentinaFormat($pc->delivery_date),
            'email' =>  $pc->customer->email,
            'id' => $pc->id,
            'is_meli_order' => $pc->is_meli_order,
            'items' => $this->items($pc),
            'payment_data' => $this->payment_data($pc),
            'phone_1' =>  $pc->customer->phone_1,
            'phone_2' =>  $pc->customer->phone_2,
            'status' => $pc->status->name,
            'status_id' => $pc->status->id,
            'status_list' => ($pc->statuses()->exists()) ? $pc->statuses : false,
            'total' => (is_null($pc->meli_data)) ? '$ ' . number_format($pc->total, 2, ',', '.') : '$ ' . number_format($pc->meli_data['total_amount'], 2, ',', '.'),
            'total_raw' => (is_null($pc->meli_data)) ? $pc->total : $pc->meli_data['total_amount'],
            //'user_name' => $pc->user->name,
            'user_on_list_status' => $this->user_on_list_status($pc),
            'has_delivery_date' => $this->hasDeliveryDate($pc),
            'first_contact' => $this->first_contact($pc),
            'pedido_fiscal_address' => (is_null($pc->address)) ? false : $this->addresses($pc->address->fiscal),
            'pedido_delivery_address' => (is_null($pc->address)) ? false : $this->addresses($pc->address->delivery),
            'meli_id' => $pc->meli_id,
            'meli_messages' => $pc->messages->unique('text')->values()->all(),
            'message_pack_id' => (is_null($pc->meli_data['pack_id'])) ? $pc->meli_data['id'] : $pc->meli_data['pack_id'],
            'message_seller_id' => ($pc->come_from_meli()) ? $pc->meli_data['seller']['id'] : false,
            'message_seller_email' => ($pc->come_from_meli()) ? (array_key_exists('email', $pc->meli_data['seller'])) ? $pc->meli_data['seller']['email'] : 'Falta Email' : false,
            'message_to_user' => ($pc->come_from_meli()) ? $pc->meli_data['buyer']['id'] : false,
        ];
    }
}
