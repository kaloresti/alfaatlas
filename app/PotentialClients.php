<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PotentialClients extends Model
{
    use Notifiable;

    protected $table = 'potential_clients';

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
        'spc',
        'cerasa',
        'fonte',
    ];
}
