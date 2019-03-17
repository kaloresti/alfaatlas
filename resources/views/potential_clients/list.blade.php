@extends('layouts.app')

@section('content')
        <div class="card border-warning">
            <div class="card-header">
                Filtros 
                
            </div>
            <div class="card-body">

                <fieldset>
                    <legend>Filtros padrões</legend>
                        <div class="btn-group">
                            <select name="font" id="font">
                                <option value="-1">Fonte de dados</option>
                                <option value="google_places">Google Places</option>
                            </select>
                        </div>
                </fieldset>
                <br>
                <div class="card border-warning">
                    <div class="card-header">Categorias</div>
                    
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="row">
                                @forelse($typePlaces as $type)
                                <div class="col-md-2">
                                    <div class="form-check" class="inline">
                                        <input style="display:inline" class="form-check-input" type="checkbox" value="{{$type}}" id="invalidCheck2" required>
                                        <label class="form-check-label" for="invalidCheck2">
                                            {{$type}}
                                        </label>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div style="width: 100%; height: 500px;">
                    {!! Mapper::render() !!}
                </div>
                <br> <br>
                <label for="validationDefault01">Digite qualquer coisa</label>
                <input type="text" class="form-control" id="validationDefault01" placeholder="digite nome de lugares, paises, ruas, etc" value="" required>
                

                <br><br><br>

                <div style="text-align:center">
                    <button class="btn btn-primary btn-lg" type="submit">PESQUISAR</button>
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
