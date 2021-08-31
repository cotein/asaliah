<?php

namespace App\Transformers\Company;

use App\Src\Models\Company;
use App\Src\Traits\DateFormatTrait;
use League\Fractal\TransformerAbstract;

class CompanyTransformer extends TransformerAbstract
{
    use DateFormatTrait;

    public function existLogo($company)
    {
        $collection = $company->getMedia('logo');

        if (! $collection->isEmpty()) {

             return $collection->first();
        }
        
        return false;
    }
    public function urlLogo($company)
    {
        if ($this->existLogo($company)) {
            return $this->existLogo($company)->getUrl();
        }

        return false;
    }

    public function imgToBase64($company)
    {
        if ($this->existLogo($company)) {

            $image = $this->existLogo($company);

            $url = $image->getPath();

            $type = $image->mime_type;

            $file = file_get_contents($url);

            $base64 = base64_encode($file);
            
            return 'data:' . $type . ';base64,' . $base64;
        }
        
        return false;
    }
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Company $company)
    {
         return [
            'id' => $company->id,
            'cuit' => $company->number,
            'name' => strtoupper($company->name),
            'inscription' => strtoupper($company->inscription->name),
            'inscription_id' => $company->inscription_id,
            'document_type' => strtoupper($company->purchaserDocument->name),
            'country' => 'ARGENTINA',
            'address' => $company->getAddress(),
            'percep_iibb' => $company->percep_iibb,
            'percep_iva' => $company->percep_iva,
            'ret_suss' => $company->ret_suss,
            'ret_iva' => $company->ret_iva,
            'ret_iibb' => $company->ret_iibb,
            'ret_gcias' => $company->ret_gcias,
            'url_logo' => ($this->urlLogo($company)) ? $this->urlLogo($company) : '/images/logos/default-logo.png',
            //'logo_base64' => $this->imgToBase64($company),
            'activity_init' => $this->ShortDateToArgentinaFormat($company->activity_init),
            'iibb_conv' => $company->iibb_conv
        ]; 
    }
}
