<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class Clients extends Model implements ToModel, FromCollection
{
    use Notifiable;

    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cnpj',
        'incricao_estatudal',
        'razao_social',
        'nome_fantasia',
        'nome_responsavel',
        'telefone',
        'email_principal',
        'celular',
        'cep',
        'cidade',
        'bairro',
        'estado',
        'pais',
        'logradouro',
        'numero',
        'status',
    ];
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cnpj' => 'required|max:14',
            'incricao_estatudal' => 'required',
            'razao_social' => 'required|max:200',
            'nome_fantasia' => 'required|max:200',
            'nome_responsavel' => 'required|max:100',
            'telefone' => 'required|max:20',
            'email_principal' => 'required|max:50',
            'celular' => 'required|max:20',
            'cep' => 'required|max:10',
            'cidade' => 'required|max:100',
            'bairro' => 'required|max:100',
            'estado' => 'required|max:100',
            'pais' => 'required|max:100',
            'logradouro' => 'required|min:10|max:300',
            'numero' => 'required|max:20',
            'status' => 'required',
        ];
    }

    public function model(array $row) 
    {
        return new Clients([
            'cnpj' => $row[0],
            'incricao_estatudal' => $row[1],
            'razao_social' => $row[2],
            'nome_fantasia' => $row[3],
            'nome_responsavel' => $row[4],
            'telefone' => $row[5],
            'email_principal' => $row[6],
            'celular' => $row[7],
            'cep' => $row[8],
            'cidade' => $row[9],
            'bairro' => $row[10],
            'estado' => $row[11],
            'pais' => $row[12],
            'logradouro' => $row[13],
            'numero' => $row[14],
            'status' => (int) $row[15],
        ]);
    }

    public function collection()
    {
        return Clients::all();
    }

}
