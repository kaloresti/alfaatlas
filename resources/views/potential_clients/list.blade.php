@extends('layouts.app')

@section('content')
        <div class="card border-warning">
            <div class="card-header">
                Filtros 
                
            </div>
            <div class="card-body">
                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Fonte
                    </button>
                    <div class="dropdown-menu">
                        Google Places
                    </div>
                </div>
                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        UF
                    </button>
                    <div class="dropdown-menu">
                        ...
                    </div>
                </div>
                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cidades
                    </button>
                    <div class="dropdown-menu">
                        ...
                    </div>
                </div>
                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bairro
                    </button>
                    <div class="dropdown-menu">
                        ...
                    </div>
                </div>
                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Logradouro
                    </button>
                    <div class="dropdown-menu">
                        ...
                    </div>
                </div>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success">Ativo</button>
                    <button type="button" class="btn btn-danger">Inativo</button>
                </div>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary">SPC</button>
                    <button type="button" class="btn btn-secondary">CERASA</button>
                </div>

            </div>
        </div>

    <br>

        <div class="card border-warning">
            <div class="card-header">
            Lista
            <div class="btn-group pull-right" style="float:right;" role="group" aria-label="Basic example">
                    <button style="float:right" type="button" class="btn btn-primary pull-right">Exportar</button>
                </div>
            </div>           
            <div class="card-body">
            <div style="width: 100%; height: 500px;">
                {!! Mapper::render() !!}
            </div>
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Razão Social</th>
                            <th>Nome Fantasia</th>
                            <th>CNPJ</th>
                            <!--<th>I. Estadual</th>-->
                            <th>Telefone</th>
                            <th>Celular</th>
                            <th>E-mail</th>
                            <th>Opções</th>
                        </th>
                    </thead>
                    <tbody>
                        @forelse($potentialClients as $client)
                            <tr>
                                <td>{{$client->razao_social}}</td>
                                <td>{{$client->nome_fantasia}}</td>
                                <td>{{$client->cnpj}}</td>
                                <!--<td>{{$client->inscricao_estadual}}</td>-->
                                <td>{{$client->telefone}}</td>
                                <td>{{$client->celular}}</td>
                                <td>{{$client->email_principal}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="">editar</a>
                                    <a class="btn btn-info btn-sm">detalhes</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">Nenhum cliente em potencial cadastrado</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>



@endsection
