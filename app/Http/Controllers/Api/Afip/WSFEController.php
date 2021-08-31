<?php

namespace App\Http\Controllers\Api\Afip;

use Jenssegers\Date\Date;
use Illuminate\Http\Request;
use App\Src\Tools\StdClassTool;
use App\Src\Afip\WS\Source\WSFEV1;
use App\Src\Traits\DateFormatTrait;
use App\Http\Controllers\Controller;
use App\Src\Afip\WS\Source\WSFECRED;
use App\Exceptions\Afip\AfipResponseException;
use App\Src\Repositories\App\SaleInvoiceRepository;
use App\Src\Afip\WS\Responses\WSFEGetCaeOnAfipResponse;
use App\Transformers\Afip\GetCaeOnAFipToSaveTransformer;
use App\Src\Afip\WS\Responses\WSFEUltimoAutorizadoResponse;

class WSFEController extends Controller
{
    use DateFormatTrait;
    
    const LENGHT_CUIT = 11;

    const CONCEPTO_PRODUCTO = 1;

    const FACTURA_A = '001';

    const ND_A = '002';

    const NC_A = '003';

    const FACTURA_B = '006';

    const ND_B = '007';

    const NC_B = '008';

    const FACTURA_CRED_ELEC_A = '201';

    const ND_CRED_ELEC_A = '202';
    
    const NC_CRED_ELEC_A = '203';

    const FACTURA_CRED_ELEC_B = '206';

    const ND_CRED_ELEC_B = '207';

    const NC_CRED_ELEC_B = '208';

    protected $wsfe;
    
    protected $wsFeCred;
    
    protected $wsfe_response;

    public function __construct()
    {
        $this->wsfe = new WSFEV1( env('WSFEV1_AFIP_ENVIRONMENT'));
        
        $this->wsFeCred = new WSFECRED( env('WSFECRED_AFIP_ENVIRONMENT'));
    }

    public function ultimo_autorizado()
    {   
        \Log::info("########### ULTIMO AUTORIZADO ##########");
        \Log::info('DATOS QUE SE VAN A CONSULTAR: CBTETIPO -> '.request()->CteTipo );
        \Log::info("###########");
        $result = $this->wsfe->ultimoAutorizado(6, request()->CteTipo);
        
        $this->wsfe_response = new WSFEUltimoAutorizadoResponse($result);

        if($this->wsfe_response->hasErrors()){
           
            $this->wsfe_response->saveErrors(request());

            $err = $this->wsfe_response->getErrors();

            throw new AfipResponseException($err->toJson(), 444);
        }

        return $this->wsfe_response->getUltimoAutorizado();
        
    }

    public function generate()
    {
        $req = request()->all()['data'];
        //dd($req);
        $cuit =  (double) $req['FECAEDetRequest']['DocNro'];
        $date = $this->change_divider_slash($req['FECAEDetRequest']['CbteFch']);
        
        //$req['FECAEDetRequest']['DocNro'] = (double) $req['FECAEDetRequest']['DocNro'];

        $FchVtoPago = $req['FECAEDetRequest']['FchVtoPago'];

        if ($req['FECAEDetRequest']['Concepto'] == self::CONCEPTO_PRODUCTO) {
            $req['FECAEDetRequest']['FchVtoPago'] = '';
        }

        if ($req['FeCabReq']['CbteTipo'] == self::FACTURA_A || $req['FeCabReq']['CbteTipo'] == self::FACTURA_B || $req['FeCabReq']['CbteTipo'] == '011') {
            $req['FECAEDetRequest']['FchVtoPago'] = '';
        }

        if (strlen($cuit) == self::LENGHT_CUIT) {
        
            if ($this->wsFeCred->isMiPyme($cuit, $date)) {
                
                if ( $req['FECAEDetRequest']['ImpNeto'] >= $this->wsFeCred->montoDesde) {

                    if ($req['FeCabReq']['CbteTipo'] == self::FACTURA_A)  $req['FeCabReq']['CbteTipo'] = self::FACTURA_CRED_ELEC_A;  
                    if ($req['FeCabReq']['CbteTipo'] == self::ND_A)  $req['FeCabReq']['CbteTipo'] = self::ND_CRED_ELEC_A;  
                    if ($req['FeCabReq']['CbteTipo'] == self::NC_A)  $req['FeCabReq']['CbteTipo'] = self::NC_CRED_ELEC_A;  
                    
                    if ($req['FeCabReq']['CbteTipo'] == self::FACTURA_B)  $req['FeCabReq']['CbteTipo'] = self::FACTURA_CRED_ELEC_B;  
                    if ($req['FeCabReq']['CbteTipo'] == self::ND_B)  $req['FeCabReq']['CbteTipo'] = self::ND_CRED_ELEC_B;  
                    if ($req['FeCabReq']['CbteTipo'] == self::NC_B)  $req['FeCabReq']['CbteTipo'] = self::NC_CRED_ELEC_B;  

                    $req['FECAEDetRequest']['FchVtoPago'] = Date::now()->addDays(60)->format('Ymd');

                    if ($req['FeCabReq']['CbteTipo'] == self::ND_CRED_ELEC_A || $req['FeCabReq']['CbteTipo'] == self::NC_CRED_ELEC_A) {
                        $req['FECAEDetRequest']['FchVtoPago'] = '';
                    }

                    if ($req['FeCabReq']['CbteTipo'] == self::FACTURA_CRED_ELEC_A || $req['FeCabReq']['CbteTipo'] == self::FACTURA_CRED_ELEC_B) {
                        $req = $this->wsFeCred->setOpcionalFactura($req);        
                    }
                    if($req['FeCabReq']['CbteTipo'] == self::NC_CRED_ELEC_A || $req['FeCabReq']['CbteTipo'] == self::NC_CRED_ELEC_B){

                        $req = $this->wsFeCred->setOpcionalNotaCredito($req);        
                    }
                    if($req['FeCabReq']['CbteTipo'] == self::ND_CRED_ELEC_A || $req['FeCabReq']['CbteTipo'] == self::ND_CRED_ELEC_B){

                        $req = $this->wsFeCred->setOpcionalNotaDebito($req);        
                    }

                    $result = $this->wsfe->ultimoAutorizado(6, $req['FeCabReq']['CbteTipo']);

                    $num = StdClassTool::toArray($result);
                    
                    $req['FECAEDetRequest']['CbteDesde'] = $num['FECompUltimoAutorizadoResult']['CbteNro'] + 1;
                    $req['FECAEDetRequest']['CbteHasta'] = $num['FECompUltimoAutorizadoResult']['CbteNro'] + 1; 
                    
                }
            }
        }
        $result = $this->wsfe->getCaeOnAfip(
            $req['FeCabReq'], 
            $req['FECAEDetRequest']
        );

        $this->wsfe_response = new WSFEGetCaeOnAfipResponse($result);

        if ($this->wsfe_response->isRejected()) {
           
            $this->wsfe_response->saveErrors(request());

            $errors = collect($this->wsfe_response->getMessages());

            throw new AfipResponseException($errors->toJson(), 444);
        }
       
       return response()->json($result, 200);
    }

    public function tipoTributos()
    {
        $result = $this->wsfe->tipoTributos();
        dd($result);
        return response()->json($result, 200);
        

    }
}