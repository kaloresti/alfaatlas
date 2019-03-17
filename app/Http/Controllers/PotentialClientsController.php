<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PotentialClients;
use SKAgarwal\GoogleApi\PlacesApi;
use Mapper;

class PotentialClientsController extends Controller
{
    private $potentialClient;
    private $typesPlaces;
    private $typeSearchs;

    public function __construct(PotentialClients $potentialClient)
    {
        $this->potentialClient = $potentialClient;
        $googlePlaces = new PlacesApi('AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw');
        //$response = $googlePlaces->placeDetails('ChIJrTLr-GyuEmsRBfy61i59si0');
        //dd($response);
    }

    public function index()
    {
        $typePlaces = $this->potentialClient->types;
        $typeSearchs = $this->potentialClient->searchs;
        $potentialClients = $this->potentialClient->all();
        
        Mapper::map(53.381128999999990000, -1.470085000000040000);

        return view('potential_clients.list', compact('potentialClients', 'typePlaces', 'typeSearchs'));
    }

    public function requestParameters(Request $request)
    {
        // -- render parameters to serach
    }

    public function search()
    {

    }
}
