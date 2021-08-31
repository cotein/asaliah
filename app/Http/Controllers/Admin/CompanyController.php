<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\Company;
use App\Src\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Src\Afip\WS\Responses\WSPUCResponse;
use App\Transformers\Company\CompanyTransformer;

class CompanyController extends Controller
{
    const ARGENTINA = 1;

    public function upload_logo()
    {
        $this->validate(request(),
            [
                'file' => 'image'
            ],
            [
                'file.image' => 'El archivo debe ser una imagen.'
            ]
        );
        
        $company = Company::find(auth()->user()->company_id);
        
        if(! $company->getMedia('logo')->isEmpty()){

            $company->clearMediaCollection('logo');
        }
        
        $company->addMediaFromRequest('file')->toMediaCollection('logo');
        $company->save();
        $company->refresh();
        return response()->json($company->getMedia('logo')->first()->getUrl(), 200);
    }

    public function logo_base_64()
    {
        $company = Company::find(auth()->user()->company_id);
        //$company->addMedia('/images/logos/rikicia-logo-web.png')->toMediaCollection('logo');
        
        $image = $company->getMedia('logo')->first();
        $url = $image->getPath();
        $type = $image->mime_type;

        $file = file_get_contents($url);

        $base64 = base64_encode($file);
        
        $logo_base_64 = [
            'url' => $url,
            'type' => $type,
            'base64' => $base64
        ];

        return response()->json($logo_base_64, 200);

    }

    public function store()
    {
        $response = new WSPUCResponse(request()->company);
        /**
         * TODO
         *  chequear si company existe
         * 
         */
        $company = new Company;
        $company->name = $response->nameOrRazonSocia();
        $company->number = $response->idPersona();
        $company->inscription_id = $response->inscriptionType();
        $company->purchaser_document_id = $response->getTipoClave();
        $company->datos_generales = ($response->hasDatosGenerales()) 
                                    ? $response->getDatosGenerales() 
                                    : null;
        $company->regimen_general = ($response->hasDatosRegimenGeneral()) 
                                    ? $response->getDatosRegimenGeneral() 
                                    : null;
        $company->monotributo = ($response->hasDatosMonotributo()) 
                                ? $response->getDatosMonotributo() 
                                : null;
        $company->afip_data = $response->getData();
        $company->save();
        $company->fresh();

        $company->addresses()->create([
            'country_id' => self::ARGENTINA,
            'province_id' => $response->getProvinceId(),
            'city_id' => $response->getCityId(),
            'address' => $response->getAddress(),
            'number' => null,
            'cp' => $response->getCodPostal(),
        ]);

        Auth::user()->company_id = $company->id;
        Auth::user()->save();

        return response()->json($company, 201);
    }

    public function show()
    {
        $company = Company::find(auth()->user()->company_id);

        $company = fractal($company, new CompanyTransformer())->toArray()['data'];

        return response()->json($company, 200);
    }

    public function update()
    {
        $data = request()->data;

        $company = Company::find(auth()->user()->company_id);
        $company->percep_iibb = ($data['values']['percep_iibb']['name'] == 'SI') ? 1 : 0;
        $company->percep_iva = ($data['values']['percep_iva']['name'] == 'SI') ? 1 : 0;
        $company->ret_gcias = ($data['values']['ret_gcias']['name'] == 'SI') ? 1 : 0;
        $company->ret_iibb = ($data['values']['ret_iibb']['name'] == 'SI') ? 1 : 0;
        $company->ret_iva = ($data['values']['ret_iva']['name'] == 'SI') ? 1 : 0;
        $company->ret_suss = ($data['values']['ret_suss']['name'] == 'SI') ? 1 : 0;
        $company->activity_init = $data['values']['activity_init']; 
        $company->iibb_conv = $data['values']['iibb_conv']; 
        $company->save();
        $company->refresh();

        $company = fractal($company, new CompanyTransformer())->toArray()['data'];

        return response()->json($company, 200);
    }
}
