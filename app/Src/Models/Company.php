<?php

namespace App\Src\Models;

use App\Src\Models\MeliToken;
use App\Src\Models\BankAccount;
use App\Src\Models\SaleInvoice;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Company extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $casts = [
        'datos_generales' => 'array',
        'regimen_general' => 'array',
        'monotributo' => 'array',
        'afip_data' => 'array',
        'settings' => 'array',
    ];

    /** 
     * Inscription -> responsoble inscripto - monotributo - etc
     */
    public function inscription()
    {
        return $this->hasOne(Inscription::class, 'id', 'inscription_id');
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    /**
     * PurchaserDocument -> cuit - dni - cuil - etc
     */
    public function purchaserDocument()
    {
        return $this->hasOne(PurchaserDocument::class, 'id', 'purchaser_document_id');
    }

    public function sale_invoices()
    {
        return $this->hasMany(SaleInvoice::class);
    }

    public function mercadoLibre()
    {
        return $this->hasOne(MeliToken::class, 'company_id', 'id');
    }

    public function banksAccounts()
    {
        return $this->morphMany(BankAccount::class, 'bank_accountable');
    }

    public function getAddress()
    {
        return $this->datos_generales['domicilioFiscal']['descripcionProvincia'] . ' - ' .
                $this->datos_generales['domicilioFiscal']['localidad']  . ' ' .
                '('.$this->datos_generales['domicilioFiscal']['codPostal']  . ') - ' .
                $this->datos_generales['domicilioFiscal']['direccion'];
    }



}
