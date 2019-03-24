@extends('layouts.app')

@section('content')

<div class="card border-warning bg-dark text-white">
    <div class="card-header">
        
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                @if(isset($photos[0]))
                    <img style="width:80px height:120px;" src="{{ $photos[0] }}" class="img-thumbnail" alt="">
                @else
                    <img style="width:80px height:120px;" src="{{ $resultSerach['icon'] }}" class="img-thumbnail" alt="">
                @endif
                
            </div>
            <div class="col-md-8">
                <h1><span class="text-uppercase">{{ $resultSerach['name'] }} </span></h1>  
                Full Address <br>
                @if(isset($resultSerach['formatted_address'])) 
                    <h3><span class="badge badge-success  badge-pill">{{ $resultSerach['formatted_address'] }} </span></h3>
                @else
                    <h3><span class="badge badge-danger  badge-pill">{{ 'not informed' }} </span></h3>
                @endif 
                Other Categories <br>
                <h4>
                    @forelse($resultSerach['types'] as $types)
                        <span class="badge badge-success badge-pill">{{$types}}</span> 
                    @empty
                        <h3><span class="badge badge-danger  badge-pill">{{ 'not informed' }} </span></h3>
                    @endforelse 
                </h4>
                

                Contact
                <h4>
                    <span class="badge badge-success badge-pill">{{$resultSerach['formatted_phone_number']}}</span> 
                    @if(isset($resultSerach['website']))
                        <a class="btn btn-link" href="{{$resultSerach['website']}}" target="_blank">access website</a>
                    @endif
                </h4>

            </div>
            <div class="col-md-2">
                open now
                <h3>
                    @if(isset($resultSerach['opening_hours'])) 
                        @if(isset($resultSerach['opening_hours']["open_now"]))
                            @if($resultSerach['opening_hours']["open_now"] == true)
                                <span class="badge badge-success  badge-pill">Yes</span>
                            @elseif($resultSerach['opening_hours']["open_now"] == false)
                                <span class="badge badge-danger  badge-pill">No</span>
                            @endif
                        @else
                            <span class="badge badge-secondary">{{ ' not informed ' }} </span>
                        @endif
                    @endif
                </h3>

                user ratings
                @if(isset($resultSerach['user_ratings_total']))
                    <h3><span class="badge badge-warning  badge-pill">{{ $resultSerach['user_ratings_total'] }} </span></h3>
                @else
                    <h3><span class="badge badge-danger  badge-pill">{{ 'not informed' }} </span></h3>
                @endif
                
                classification
                @if(isset($resultSerach['rating']))
                    <h3><span class="badge badge-warning">{{ $resultSerach['rating'] }} </span></h3>
                @else
                    <h3><span class="badge badge-danger">{{ 'not informed' }} </span></h3>
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
                    <h3><span class="badge badge-danger">{{ ' not informed ' }} </span></h3>
                @endif    
            </div>     
        </div>

        <div class="row">
            <div class="col-md-12">
            <hr style="color:white">
            </div>
        </div>
       
        <div class="row">
            <div class="col-lg-4">
                
                    <h4>User comments and ratings</h4>
                    @forelse($resultSerach['reviews'] as $review)
                    <div class="row">
                        
                            <div class="col-md-4" style="text-align:center;">
                                <img src="{{$review['profile_photo_url']}}" class="img-thumbnail" style="width: 100px; height:100px;" alt="">
                                <br><br><a target="_blank" href="{{$review['author_url']}}">{{$review['author_name']}}</a> 
                            </div>
                            <div class="col-md-8" style="text-align:justify;">
                                <p style="font-size: 18px;">{{$review['text']}}</p>
                                <p>
                                    <span class="badge badge-primary badge-pill"> {{$review['relative_time_description']}} </span>
                                    user rate
                                    <span class="badge badge-warning badge-pill"> {{$review['rating']}} </span>
                                </p>
                            </div>
                        
                        
                    </div><br>
                    
                    @empty
                        <span class="badge badge-danger badge-pill">{{'not informed'}}</span> <br>
                    @endforelse
                
            </div>
            <div class="col-lg-4">
                <h4>Place Images</h3>
                @if(null !== $photos && isset($photos))
                    @forelse($photos as $photo)
                        <img src="{{$photo}}" class="img-thumbnail" style="width: 150px; height:150px;" alt="">
                    @empty
                        <span class="badge badge-danger badge-pill">{{'not informed'}}</span> <br>
                    @endforelse
                @endif
            </div>
            <div class="col-lg-4">
                <h3>Map</h3>
                <div style="width: 100%; height: 700px;">
                    {!! Mapper::render() !!}
                </div> <br>

                <h3>Opening Hours <br></h3> 
                <h5>
                @forelse($resultSerach['opening_hours']['weekday_text'] as $weekday)
                    <span class="badge badge-primary badge-pill">{{$weekday}}</span> <br>
                @empty
                    <span class="badge badge-danger badge-pill">{{'not informed'}}</span> 
                @endforelse
                </h5>
            </div>
        </div>
            
        <!-- <pre> {{ var_dump($resultSerach) }}</pre> -->

    </div>
</div>

@endsection
