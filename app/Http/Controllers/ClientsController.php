<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use App\FileStream;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use File;
//use Validator;

class ClientsController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Clients();
        $this->file = new FileStream();
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

    public function update(Request $request, $id){

        $request->validate($this->client->rules());

        $data = $request->all();

        if($data['status'] == "on") {
            $data['status'] = 1;
        }
        else {
            $data['status'] = 0;
        }

        $editRetorno = $this->client->save();

        return  redirect()->back()->with('success', 'Cliente salvo com sucesso!');

    }

    public function importClientsFile(Request $request) 
    {
        $file = $request->file_select;

        if($request->file_select->isValid()) 
        {
            $this->file->fileName = $request->file_select->getClientOriginalName();
            $this->file->size = $request->file_select->getClientSize();
            $this->file->extension = $request->file_select->getClientOriginalExtension();

            $date = uniqid(date('HisYmd'));
           
            $name = explode(".", $this->file->fileName);

            $fileName = "{$name[0]}.{$date}.{$this->file->extension}";

            $upload = $request->file_select->storeAs('files_imported', $fileName);

            $filePath = storage_path().'/app/public/files_imported/'.$fileName;

            Excel::import(new Clients, $filePath);

            if ( !$upload )
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
            
            File::delete($filePath);
        }
        
        return  redirect()->back()->with('success', 'Planilha Importada com Sucesso!');
    }
}
