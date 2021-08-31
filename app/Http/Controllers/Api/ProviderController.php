<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Src\Repositories\App\ProviderRepository;

class ProviderController extends Controller
{
    protected $pRepo;

    public function __construct(ProviderRepository $pRepo)
    {
        $this->pRepo = $pRepo;
    }

    public function find_by_name()
    {
        return $this->pRepo->find_by_name(request()->provider);
    }
    
    public function store()
    {
        $validator = \Validator::make(request()->all(), [
            'provider.name' => 'required|unique:providers,name',
            'provider.number' => 'required|unique:providers,number',
            'provider.inscription.id' => 'required',
            'provider.purchase_document.id' => 'required',
            'provider.sublevel_accounting_account.id' => 'required',
        ],
        [
            'provider.name.required' => 'El campo Nombre es requerido.',        
            'provider.name.unique' => 'Este proveedor ya se encuentra registrado.',        
            'provider.number.required' => 'El campo Número es requerido.',        
            'provider.number.unique' => 'La CUIT ya se encuentra registrada.',        
            'provider.inscription.id.required' => 'El campo Inscripción es requerido.',   
            'provider.purchase_document.id.required' => 'El campo Documento Tipo es requerido.',   
            'provider.sublevel_accounting_account.id.required' => 'El campo Cuenta Gastos es requerido.',   
        ]);
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 422);
        }
        //dd(request()->provider);
        $pr = request()->all();
        $prov = $this->pRepo->create($pr['provider']);

        return response()->json($prov, 201);
    }
}
