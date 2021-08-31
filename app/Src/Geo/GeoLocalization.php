<?php

namespace App\Src\Geo;

use GuzzleHttp\Client;
use Spatie\Geocoder\Geocoder;

class GeoLocalization{
    
    protected $geocoder;

    public function __construct()
    {
        $client = new Client();

        $this->geocoder = new Geocoder($client);

        $this->geocoder->setApiKey(config('geocoder.key'));

        $this->geocoder->setCountry(config('geocoder.region'));
    }


    public function findAddress($address, $city, $province, $country)
    {
        return $this->geocoder->getCoordinatesForAddress($address, $city, $province, $country);
    }
}
