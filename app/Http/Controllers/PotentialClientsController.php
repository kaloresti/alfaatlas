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
    public $googlePlaces;

    public $textSearch;

    public function __construct(PotentialClients $potentialClient)
    {
        $this->potentialClient = $potentialClient;
        $this->googlePlaces = new PlacesApi('AIzaSyA1wFEFGjTLKx_CSRVMuQRWvMkWZllmlLw');
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
        
        $this->textSearch = "";
    }

    public function index()
    {
        $resultSerach = [];
        // -- categorias dos lugares
        $typePlaces = $this->potentialClient->types;
        // -- tipos de buscas permitidas pelo google places
        $typeSearchs = $this->potentialClient->searchs;
        // -- lista de clientes em potencial gravados
        $potentialClients = $this->potentialClient->all();
        
        $allCountries = $this->countries->all();
        
        $response = $this->googlePlaces->textSearch('restaurant%SaoPaulo');
        $resultSerach = $response['results'];

        Mapper::map(-23.533773, -46.625290);
        foreach($resultSerach as $place) {
            Mapper::marker($place['geometry']['location']['lat'], $place['geometry']['location']['lng'], ['symbol' => 'circle', 'scale' => 1000]);
        }
        
        return view('potential_clients.list', compact('potentialClients', 'typePlaces', 'typeSearchs', 'allCountries', 'resultSerach'));
    }
    
    public function PlaceGoogleSearch(Request $request)
    {   
        
        $request->validate($this->potentialClient->rules());

        $dataSearch = (object)$request->all();
        //dd($dataSearch);
        $resultSerach = [];
        // -- categorias dos lugares
        $typePlaces = $this->potentialClient->types;
        // -- tipos de buscas permitidas pelo google places
        $typeSearchs = $this->potentialClient->searchs;
        // -- lista de clientes em potencial gravados
        $potentialClients = $this->potentialClient->all();
        
        $allCountries = $this->countries->all();
        
        $response = $this->googlePlaces->nearbySearch($dataSearch->lat.','.$dataSearch->lng, $dataSearch->radius, 
            [
                'type' => $dataSearch->type, 
                'rankby' => 'distance', 
                'keyword' => $dataSearch->keyword
        ]);

        $resultSerach = $response['results'];
        
        Mapper::map($dataSearch->lat, $dataSearch->lng);
        foreach($resultSerach as $place) {
            Mapper::marker($place['geometry']['location']['lat'], $place['geometry']['location']['lng'], ['symbol' => 'circle', 'scale' => 1000]);
        }
        
        return view('potential_clients.list', compact('potentialClients', 'typePlaces', 'typeSearchs', 'allCountries', 'resultSerach'));
    }

    public function placeDetails($place_id)
    {
        $response = $this->googlePlaces->placeDetails($place_id);
        $resultSerach = $response['result'];
        //return view('potential_clients.list');
        return json_encode($resultSerach);
    }

    public function autoComplete($text)
    {
        $response = $this->googlePlaces->placeAutocomplete($text);
        
        return json_encode($response);
    }

    public function openFullDetails($place_id)
    {
        $response = $this->googlePlaces->placeDetails($place_id);
        $resultSerach = $response['result'];
        //return view('potential_clients.list');
        return view('potential_clients.details', compact('resultSerach'));
        //return json_encode($resultSerach);
    }
}
