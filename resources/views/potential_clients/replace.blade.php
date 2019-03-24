<div class="col-md-10">
                
                <div class="row"> 
                <h3>Users Comments</h3>
                <br><br>
                    <div class="col-md-6">
                    <div class="row">
                    @forelse($resultSerach['reviews'] as $review)
                    
                        
                            <div class="col-md-4" style="text-align:center;">
                                <img src="{{$review['profile_photo_url']}}" class="img-thumbnail" style="width: 100px; height:100px;" alt="">
                                <br><br><a target="_blank" href="{{$review['author_url']}}">{{$review['author_name']}}</a> 
                            </div>
                            <div class="col-md-8" style="text-align:justify;">
                                <p style="font-size: 18px;">{{$review['text']}}</p> <br>
                                <span class="badge badge-primary badge-pill"> {{$review['relative_time_description']}} </span>
                                user rate
                                <span class="badge badge-warning badge-pill"> {{$review['rating']}} </span>
                            </div>
                        
                        
                   
                    @empty

                    @endforelse
                    </div>
                    <div class="col-md-6" style="text-align:justify;">
                    
                    </div>
                    </div>  
               <!-- <br> -->
                    
                </div> <br>

                
                
                <br><br>

                
            </div>
            <div class="col-md-2">
                
            </div>
        </div>