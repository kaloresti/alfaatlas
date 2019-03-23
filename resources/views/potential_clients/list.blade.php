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
                <div class="collapse" id="collapseExample">
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
                    <button class="btn btn-danger btn-lg" type="submit">PESQUISAR</button>
                </div>

            </div>
        </div>

    <br>

        <div class="card border-warning" id="resultados">
            <div class="card-header">
            Results
            <!-- <div class="btn-group pull-right" style="float:right;" role="group" aria-label="Basic example">
                    <button style="float:right" type="button" class="btn btn-primary pull-right">Exportar</button>
                </div>
            </div> -->
            <div class="card-body">
                <div style="width: 100%; height: 700px;">
                    {!! Mapper::render() !!}
                </div>            
                <br><br><br>
                    @forelse($resultSerach as $place)
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img style="width:60px height:60px;" src="{{$place['icon']}}" class="rounded float-left" alt="">
                                </div>
                                <div class="col-md-8">
                                    <h1>{{ $place['name'] }}</h1>  
                                    <p> 
                                    Address:

                                    @if(isset($place['formatted_address'])) 
                                        <h3><span class="badge badge-warning">{{ $place['formatted_address'] }} </span></h3>
                                    @else
                                        <h3><span class="badge badge-secondary">{{ 'not informed' }} </span></h3>
                                    @endif

                                    
                                    @forelse($place['types'] as $types)
                                        <span class="badge badge-secondary badge-pill">{{$types}}</span> 
                                    @empty

                                    @endforelse <br><br><br>
                                    <a class="btn btn-primary btn-lg" href="/potential_clients/full_details/{{$place['place_id']}}">details</a>
                                    
                                </div>
                                <div class="col-md-2">
                                    @if(isset($place['opening_hours'])) 
                                        @if(isset($place['opening_hours']["open_now"]))
                                            @if($place['opening_hours']["open_now"] == true)
                                                <h3><span class="badge badge-success">Open</span></h3>
                                            @elseif($place['opening_hours']["open_now"] == false)
                                                <h3><span class="badge badge-danger">Closed</span></h3>
                                            @endif
                                        @else
                                            <h3><span class="badge badge-secondary">{{ ' not informed ' }} </span></h3>
                                        @endif
                                    @endif

                                    user ratings
                                    
                                    @if(isset($place['user_ratings_total']))
                                        <h3><span class="badge badge-warning">{{ $place['user_ratings_total'] }} </span></h3>
                                    @else
                                        <h3><span class="badge badge-secondary">{{ 'not informed' }} </span></h3>
                                    @endif
                                    
                                    classification
                                    @if(isset($place['rating']))
                                        <h3><span class="badge badge-warning">{{ $place['rating'] }} </span></h3>
                                    @else
                                        <h3><span class="badge badge-secondary">{{ 'not informed' }} </span></h3>
                                    @endif
                                    
                                    
                                        price level 
                                        
                                        @if(isset($place['price_level'])) 
                                            @if($place['price_level'] == 0)
                                                <h3><span class="badge badge-success">Free</span></h3>
                                            @elseif($place['price_level'] == 1)
                                            
                                                <h3><span class="badge badge-light">Inexpensive</span></h3>
                                            @elseif($place['price_level'] == 2)
                                            
                                                <h3><span class="badge badge-info">Moderate</span></h3>
                                            @elseif($place['price_level'] == 3)
                                            
                                                <h3><span class="badge badge-warning">Expensive</span></h3>
                                            @elseif($place['price_level'] == 4)
                                            
                                                <h3><span class="badge badge-danger">Very Expensive</span></h3>
                                            @endif
                                        @else 
                                        
                                            <h3><span class="badge badge-secondary">{{ ' not informed ' }} </span></h3>
                                        
                                        @endif    
                                </div>
                            </div>
                        </div>
                    </div><br><br>
                    @empty
                        <h1><span class="badge badge-danger">Sorry! Not results founded.</span></h1>
                    @endforelse

            </div>
        </div>

        <style>
        
        </style>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-full modal-lg w-75" style="width:98%;" role="document">
            <div class="modal-content" style="width:98%;">
           
            <div class="modal-body">
                <div class="card border-warning">
                    <div class="card-header">
                        Comments 
                        
                    </div>
                    <div class="card-body">
                        <div id="comments"></div>
                    </div>
                </div>
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
                        var reviews = '<div class="col-md-12">'; 
                        $.each(response.reviews, function() {
                            reviews += '<div class="row"><div class="col-md-3"><img style="width:12px height:12px;" src="'+this.profile_photo_url+'" class="" alt=""></div>';
                            reviews += '<div class="col-md-9"><h3>'+this.author_name+'</h3><p>'+this.text+'</p><p><b>Where </b>'+this.relative_time_description+'</p><p><b>Rating </b> '+this.rating+'</p></div></div><br>';
                        
                        });
                        reviews += '<div>'; 
                        $("#comments").html(reviews);
                        $("#adr_address").html(response.adr_address);
                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }
                });
            }

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
