<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PotentialClients;
use Mapper;

class PotentialClientsController extends Controller
{
    private $potentialClient;

    public function __construct(PotentialClients $potentialClient)
    {
        $this->potentialClient = $potentialClient;
    }

    public function index()
    {
        $potentialClients = $this->potentialClient->all();
        
        Mapper::map(53.381128999999990000, -1.470085000000040000);

        return view('potential_clients.list', compact('potentialClients'));
    }
}
