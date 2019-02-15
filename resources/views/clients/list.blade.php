@extends('layouts.app')

@section('content')


        <div class="card">
            <div class="card-header">Filtros</div>

            <div class="card-body">

            </div>
        </div>

    <br>

        <div class="card">
            <div class="card-header">Lista</div>

            <div class="card-body">

                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Razão Social</th>
                            <th>Nome Fantasia</th>
                            <th>CNPJ</th>
                            <th>I. Estadual</th>
                            <th>Telefone</th>
                            <th>Celular</th>
                            <th>E-mail</th>
                        </th>
                    </thead>
                    <tbody>
                        @forelse($clients as $client)
                            <tr>
                                <td>{{$client->razao_social}}</td>
                                <td>{{$client->nome_fantasia}}</td>
                                <td>{{$client->cnpj}}</td>
                                <td>{{$client->inscricao_estadual}}</td>
                                <td>{{$client->telefone}}</td>
                                <td>{{$client->celular}}</td>
                                <td>{{$client->email_principal}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Nenhum cliente cadastrado</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>



@endsection
