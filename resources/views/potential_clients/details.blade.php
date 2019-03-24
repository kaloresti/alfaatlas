@extends('layouts.app')

@section('content')

<div class="card border-warning">
    <div class="card-header">
        Detalhes de:                  
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <img style="width:80px height:120px;" src="{{$photos[0]}}" class="img-thumbnail" alt="">
            </div>
            <div class="col-md-8">
                <h1><span class="badge badge-primary  badge-pill">{{ $resultSerach['name'] }} </span></h1>  
                 
                Address
                @if(isset($resultSerach['formatted_address'])) 
                    <h3><span class="badge badge-success  badge-pill">{{ $resultSerach['formatted_address'] }} </span></h3>
                @else
                    <h3><span class="badge badge-secondary  badge-pill">{{ 'not informed' }} </span></h3>
                @endif

                Other Categories <br>
                <h4>
                    @forelse($resultSerach['types'] as $types)
                        <span class="badge badge-success badge-pill">{{$types}}</span> 
                    @empty

                    @endforelse 
                </h4>
                

                Contact
                <h4>
                    <span class="badge badge-success badge-pill">{{$resultSerach['formatted_phone_number']}}</span> 
                    <a class="btn btn-link" href="{{$resultSerach['website']}}" target="_blank">access website</a>
                </h4>
                
            </div>
            <div class="col-md-2">
                <h3>
                    @if(isset($resultSerach['opening_hours'])) 
                        @if(isset($resultSerach['opening_hours']["open_now"]))
                            @if($resultSerach['opening_hours']["open_now"] == true)
                                <span class="badge badge-success">Open</span>
                            @elseif($resultSerach['opening_hours']["open_now"] == false)
                                <h3><span class="badge badge-danger">Closed</span></h3>
                            @endif
                        @else
                            <h3><span class="badge badge-secondary">{{ ' not informed ' }} </span></h3>
                        @endif
                    @endif
                </h3>
                user ratings
                
                @if(isset($resultSerach['user_ratings_total']))
                    <h3><span class="badge badge-warning">{{ $resultSerach['user_ratings_total'] }} </span></h3>
                @else
                    <h3><span class="badge badge-secondary">{{ 'not informed' }} </span></h3>
                @endif
                
                classification

                @if(isset($resultSerach['rating']))
                    <h3><span class="badge badge-warning">{{ $resultSerach['rating'] }} </span></h3>
                @else
                    <h3><span class="badge badge-secondary">{{ 'not informed' }} </span></h3>
                @endif
                
                
                price level 
                
                @if(isset($resultSerach['price_level'])) 
                    @if($resultSerach['price_level'] == 0)
                        <h3><span class="badge badge-success">Free</span></h3>
                    @elseif($resultSerach['price_level'] == 1)
                    
                        <h3><span class="badge badge-light">Inexpensive</span></h3>
                    @elseif($resultSerach['price_level'] == 2)
                    
                        <h3><span class="badge badge-info">Moderate</span></h3>
                    @elseif($resultSerach['price_level'] == 3)
                    
                        <h3><span class="badge badge-warning">Expensive</span></h3>
                    @elseif($resultSerach['price_level'] == 4)
                    
                        <h3><span class="badge badge-danger">Very Expensive</span></h3>
                    @endif
                @else 
                
                    <h3><span class="badge badge-secondary">{{ ' not informed ' }} </span></h3>
                
                @endif    
            </div>     
        </div>
        <div class="row">
            <div class="col-md-12">
            <hr>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-10">
                <h3>Users Comments</h3>
                <br>
                
                    @forelse($resultSerach['reviews'] as $review)
                    <div class="row">
                        <div class="col-md-2" style="text-align:center;">
                            <img src="{{$review['profile_photo_url']}}" class="img-thumbnail" style="width: 100px; height:100px;" alt="">
                            <br><br><a target="_blank" href="{{$review['author_url']}}">{{$review['author_name']}}</a> 
                        </div>
                        <div class="col-md-8" style="text-align:justify;">
                            {{$review['text']}} <br>
                            {{$review['relative_time_description']}}
                        </div>
                        <div class="col-md-2" style="text-align:justify;">
                            
                        </div>
                    </div> <br>
                    @empty

                    @endforelse
                    
                
                
                <br>
                
                <h3>Place Images</h3>
                @forelse($photos as $photo)
                    <img src="{{$photo}}" class="img-thumbnail" style="width: 300px; height:300px;" alt="">
                @empty

                @endforelse

                <br><br>

                <h3>Map</h3>
                <div style="width: 100%; height: 700px;">
                    {!! Mapper::render() !!}
                </div> 
            </div>
            <div class="col-md-2">
                Opening Hours <br> 
                @forelse($resultSerach['opening_hours']['weekday_text'] as $weekday)
                    <span class="badge badge-primary badge-pill">{{$weekday}}</span></h4> <br>
                @empty

                @endforelse
            </div>
        </div>
        <!-- <pre> {{ var_dump($resultSerach) }}</pre> -->
    </div>
</div>

@endsection
