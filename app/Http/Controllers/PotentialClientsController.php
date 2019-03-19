<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PotentialClients;
use SKAgarwal\GoogleApi\PlacesApi;
use Mapper;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use PragmaRX\Countries\Package\Countries;
use PragmaRX\Countries\Package\Services\Config;
use Illuminate\Support\Collection;

class PotentialClientsController extends Controller
{
    private $potentialClient;
    private $typesPlaces;
    private $typeSearchs;
    public $client;
    public $countries;

    public function __construct(PotentialClients $potentialClient)
    {
        $this->potentialClient = $potentialClient;
        $googlePlaces = new PlacesApi('AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw');
        $this->client = new Client(); //GuzzleHttp\Client
        $this->countries = new Countries(new Config([
            'hydrate' => [
                'elements' => [
                    'currencies' => true,
                    'flag' => true,
                    'timezones' => true,
                ],
            ],
        ]));
        //$countries = new Countries();

        
        //$response = $googlePlaces->placeDetails('ChIJrTLr-GyuEmsRBfy61i59si0');
        //dd($response);
    }

    public function index()
    {
        // -- categorias dos lugares
        $typePlaces = $this->potentialClient->types;
        // -- tipos de buscas permitidas pelo google places
        $typeSearchs = $this->potentialClient->searchs;
        // -- lista de clientes em potencial gravados
        $potentialClients = $this->potentialClient->all();
        
        $allCountries = $this->countries->all();
        // error_log(print_r($countries, true), 0);
        //dd($allCountries);
        Mapper::map(53.381128999999990000, -1.470085000000040000);
       
        return view('potential_clients.list', compact('potentialClients', 'typePlaces', 'typeSearchs', 'allCountries'));
    }

    public function searchCities(Array $countries)
    {

    }

    public function requestParameters(Array $params)
    {
        // -- render parameters to serach
    }

    public function search()
    {

    }
}
