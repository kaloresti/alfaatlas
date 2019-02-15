<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;

class ClientsController extends Controller
{
    private $client;

    public function __construct(Clients $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $clients = $this->client->all();

        return view('clients.list', compact('clients'));
    }

}
