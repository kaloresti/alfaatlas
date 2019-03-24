@extends('layouts.app')

@section('content')
        <div class="card border-warning">
            <div class="card-header">
                Filtros                 
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/potential_clients/place_google_search" method="POST">
                @csrf
                <fieldset>
                    <legend>Filtros padrões</legend>
                        <div class="btn-group">
                            <select name="data_font" id="font">
                                <option value="-1">Fonte de dados</option>
                                <option value="google_places">Google Places</option>
                            </select>
                        </div>
                </fieldset>
                <br>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Categories
                </a>
                <div class="collapse show" id="collapseExample">
                    <div class="card card-body">
                    <div class="form-group mb-3">
                            <div class="row">
                                @forelse($typePlaces as $type)
                                    <div class="col-md-2">
                                        <div class="form-check" class="inline">
                                            <input style="display:inline" class="form-check-input" type="radio" value="{{$type}}" id="type" name="type" />
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
                <div class="input-group mb-3">
                    <input id="locality" name="locality" onblur="autoComplete(this.value)" type="text" class="form-control" placeholder="Digite uma Cidade do mundo" aria-label="Recipient's username" aria-describedby="basic-addon2">                    
                    <input type="hidden" id="lat" name="lat" value="">
                    <input type="hidden" id="lng" name="lng" value="">
                    <br><br><br>
                    <div id="results_cities"></div>
                </div>
                
                <br>
                
                <input type="text" class="form-control" id="radius" name="radius"  placeholder="Digite uma distância em KM (raio da pesquisa)" value="{{ null !== old('radius') ? old('radius') : old('radius') }}">
                
                <br><br>
                
                <input type="text" class="form-control" id="keyword" name="keyword"  placeholder="Digite uma palavra-chave adequada" value="">
                
                <br><br><br>

                <div style="text-align:center">
                    <button class="btn btn-success btn-outline btn-lg col-md-12" type="submit">PESQUISAR</button>
                </div>
            </div>
        </div>

    
    
        

       

        <script>
            function autoComplete(text)
            {
                $.ajax({
                    type    :"GET",
                    url     :"/potential_clients/auto_complete/"+text,
                    dataType:"json",
                    success :function(response) {
                        $.each(response.predictions, function() {
                            $("#results_cities").append('<a class="btn btn-link" id="'+this.description+'" href="javascript:selectLocality(\''+this.place_id+'\')">'+this.description+'</a><br>');
                            
                            //$("#results_cities").append(this.description)
                        });  
                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }
                });
            }

            function selectLocality(place_id)
            {
                $("#locality").val("Pesquisando Localidade ... aguarde!");
                $.ajax({
                    type    :"GET",
                    url     :"/potential_clients/place_details/"+place_id,
                    dataType:"json",
                    //data    :{ data1:data },
                    success :function(response) {
                        console.log(response);
                        $("#lat").val(response.geometry.location.lat);
                        $("#lng").val(response.geometry.location.lng);
                        $("#locality").val(response.formatted_address); 
                        $("#results_cities").hide("fast");  
                    },
                    error: function(e) {
                        $("#locality").val("NÃO FOI POSSÍVEL ENCONTRAR A LOCALIDADE, TENTE NOVAMENTE!");
                    }
                });
                //details(this.matched_substrings[0].place_id);
            }
        </script>


@endsection
