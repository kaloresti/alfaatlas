<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PotentialClients;

class PotentialClientsController extends Controller
{
    private $potentialClient;

    public function __construct(PotentialClients $potentialClient)
    {
        $this->potentialClient = $potentialClient;
    }

    public function index()
    {
        $potentialClient = $this->potentialClient->all();

        return view('potential_clients.list', compact('potentialClient'));
    }
}
