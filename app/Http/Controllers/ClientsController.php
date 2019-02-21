<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
//use Validator;

class ClientsController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Clients();
    }

    public function index()
    {
        $clients = $this->client->all();

        return view('clients.list', compact('clients'));
    }

    public function create() {
        return view('clients.create');
    }

    public function store(Request $request) {
        // Pegando todos os dados que serão mandados no body
        $request->validate($this->client->rules());

        $data = $request->all();

        if($data['status'] == "on") {
            $data['status'] = 1;
        }
        else {
            $data['status'] = 0;
        }

        $saveRetorno = $this->client->create($data);

        return  redirect()->back()->with('success', 'Cliente salvo com sucesso!');

    }

  


}
