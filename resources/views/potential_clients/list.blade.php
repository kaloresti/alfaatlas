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
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Digite nome de Cidades, Bairros, Ruas, CEPs" aria-label="Recipient's username" aria-describedby="basic-addon2">                    
                </div>

                
                
                <input type="text" class="form-control" id="text_places" name="text_places"  placeholder="digite nome de lugares (Apple, Microsoft, Mc Donalds)" value="">
                

                <br><br><br>

                <div style="text-align:center">
                    <button onclick="googleSearch()" class="btn btn-danger btn-lg" type="button">PESQUISAR</button>
                </div>

            </div>
        </div>

    <br>

        <div class="card border-warning" id="resultados" style="display:none;">
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
                            <div class="card bg-dark text-white">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img style="width:60px height:60px;" src="{{$place['icon']}}" class="rounded float-left" alt="">
                                        </div>
                                        <div class="col-md-8">
                                            <h1>{{ $place['name'] }}</h1>  
                                            <p> {{ $place['formatted_address'] }}</p>
                                            @forelse($place['types'] as $types)
                                                <span class="badge badge-secondary badge-pill">{{$types}}</span> 
                                            @empty

                                            @endforelse <br><br><br>
                                            <a class="btn btn-success btn-lg" href="javascript:details('{{$place['place_id']}}')">see more details</a>
                                        </div>
                                        <div class="col-md-2">
                                            @if(isset($place['opening_hours'])) 
                                                @if($place['opening_hours']["open_now"] == true)
                                                    <h3><span class="badge badge-success">Open</span></h3>
                                                @elseif($place['opening_hours']["open_now"] == false)
                                                    <h3><span class="badge badge-danger">Closed</span></h3>
                                                @endif
                                            @endif
                                            user ratings
                                            <h3><span class="badge badge-primary">{{ $place['user_ratings_total'] }}</span></h3>
                                            classification
                                            <h3><span class="badge badge-warning">{{ $place['rating'] }} / 5</span></h3>
                                            
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
                                                
                                                    <span class="badge badge-secondary">{{ ' not informed ' }} </span>
                                                
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
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="adr_address"></span>
                <div class="card border-warning">
                    <div class="card-header">
                        Comments 
                        
                    </div>
                    <div class="card-body">
                        <div id="comments"></div>
                    </div>
                </div>
                
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

            function googleSearch()
            {
                $("#resultados").css("display", "block")
            }
        </script>


@endsection
