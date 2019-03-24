@extends('layouts.app')

@section('content')
<div style="width: 100%; height: 700px;">
                    {!! Mapper::render() !!}
                </div>    <br>
<br>
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

                    

                    
              
                    <form action="/potential_clients/place_google_search" method="POST">

                        @csrf
                        @if(null !== $nextPageToken)

                            
                            <input id="type" name="type" type="hidden" value="{{$dataSearch->type}}">
                            <input id="locality" name="locality" type="hidden" value="{{$dataSearch->locality}}">                     
                            <input type="hidden" id="lat" name="lat" value="{{$dataSearch->lat}}">
                            <input type="hidden" id="lng" name="lng" value="{{$dataSearch->lng}}">
                                                   
                            
                            
                            <input type="hidden" id="radius" name="radius" value="{{$dataSearch->radius}}">
                            
                            
                            
                            <input type="hidden" id="keyword" name="keyword"  value="{{$dataSearch->keyword}}">

                            <input type="hidden" id="nextPageToken" name="nextPageToken"  placeholder="" value="{{$nextPageToken}}">
                            <br>

                            <div style="text-align:center">
                                <button class="btn btn-primary btn-lg col-md-12" type="submit">PRÓXIMA PÁGINA</button>
                            </div>
                    
                        @endif;
                    
                    </form>
        @endsection