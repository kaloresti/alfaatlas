@extends('layouts.app')

@section('content')
        <div class="card border-warning" style="display:none;">
            <div class="card-header">
                Filtros 
                
            </div>
            <div class="card-body">

                <fieldset>
                    <legend>Filtros padrões</legend>
                        <div class="btn-group">
                            <select name="data_font" id="font">
                                <option value="-1">Fonte de dados</option>
                                <option value="google_places">Google Places</option>
                            </select>
                        </div>
                        <div class="btn-group">
                            <select name="data_cross" id="font">
                                <option value="-1">Permutar dados?</option>
                                <option value="yes">Sim</option>
                                <option value="no">Não</option>
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
                                        <input style="display:inline" class="form-check-input" type="checkbox" value="{{$type}}" id="places_category" name="places_category">
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
                
               
                <br> <br>
                <div class="card border-warning">
                    <div class="card-header">Países</div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="btn-group col-md-12">
                                <div class="row">
                                    @forelse($allCountries as $country)
                                    <div class="col-md-4">
                                        <div class="form-check" class="inline">
                                            <input style="display:inline" class="form-check-input" type="checkbox" value="{{$country['formal_en']}}" id="country{{$country['formal_en']}}" name="country">
                                            <label class="form-check-label" for="country{{$country['formal_en']}}">
                                                {!! $country['formal_en'] !!}
                                            </label>
                                        </div>
                                    </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br> <br>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Digite nome de Cidades, Bairros, Ruas, CEPs" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button">Pesquisar</button>
                    </div>
                </div>

                <br> <br>
                <label for="validationDefault01">Digite nome de lugares (Apple, Microsoft, Mc Donalds)</label>
                <input type="text" class="form-control" id="text_places" name="text_places" placeholder="digite nome de lugares" value="">
                

                <br><br><br>

                <div style="text-align:center">
                    <button onclick="googleSearch()" class="btn btn-danger btn-lg" type="button">PESQUISAR</button>
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
                <div style="width: 100%; height: 700px;">
                    {!! Mapper::render() !!}
                </div>            
                <br><br><br>
                <!-- <div class="card-deck">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">Detalhes</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Users Ratings</th>
                            <th scope="col">Price Level</th>
                            <th scope="col">Open now?</th>
                            <th scope="col">Other types</th>
                            </tr>
                        </thead>
                        <tbody> -->
                            @forelse($resultSerach as $place)
                            <div class="card">
                                <div class="card-header">
                                    <b class="text-uppercase">{{ $place['name'] }}</b> User Ratings: <b>{{ $place['user_ratings_total'] }}</b>
                                </div>
                                <div class="card-body">
                                    <img style="width:30px height:30px;" src="{{$place['icon']}}" alt="">
                                   <p><b>Endereço:</b> {{ $place['formatted_address'] }}</p>
                                   <p><b>Price Level:</b> @if(isset($place['price_level'])) {{$place['price_level']}} @else {{ '---' }} @endif</p>
                                   <p><b>Aberto agora? </b>{{ $place['opening_hours']["open_now"]}}</p>
                                   
                                   <p><b>Other types: </b>
                                   @forelse($place['types'] as $types)
                                             {{$types.', '}} 
                                        @empty

                                        @endforelse
                                        </p>
                                        <a class="btn btn-secondary btn-sm outline" href="javascript:details('{{$place['place_id']}}')">details</a> 
                                </div>
                            </div><br><br>
                                <!-- <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $place['name'] }}</td>
                                    <td>{{ $place['formatted_address'] }} </td>
                                    <td>{{ $place['user_ratings_total'] }}</td>
                                    <td>@if(isset($place['price_level'])) {{$place['price_level']}} @else {{ '---' }} @endif</td>
                                    <td>{{ $place['opening_hours']["open_now"]}}</td>
                                    <td>
                                        @forelse($place['types'] as $types)
                                            <span> {{$types}} </span><br>
                                        @empty

                                        @endforelse
                                    </td>
                                </tr> -->
                            @empty

                            @endforelse
                        <!-- </tbody>
                    </table>
                </div> -->
            </div>
        </div>

        <style>
        
        </style>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>

        <script>
            function details(place_id)
            {
                $('#exampleModalLong').modal("show")
                $.ajax({
                    type    :"GET",
                    url     :"/potential_clients/place_details/"+place_id,
                    dataType:"json",
                    //data    :{ data1:data },
                    success :function(response) {
                        console.log(response);

                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }
                });
            }
        </script>


@endsection
