@extends('students.layouts')
@section('content')
  <br><br>
<h1>Student Dashboard</h1>

@foreach ($announcements as $ann)

    @php
        $anno=explode('|',$ann->images);
    @endphp

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="">
                <h1></h1>
                <div class="row justify-content-center p-3">
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="card">
                            <div>
                                <div class="d-flex justify-content-between">
                                    <div><b>From: Admin</b><br> {{ $ann->created_at }} </div>
                                    
                                </div>
                            </div>
                                
                            <div id="myCarousel-{{ $ann->id }}" class="carousel slide" data-bs-ride="carousel">
                                {{-- <div class="carousel-indicators">
                                  <button type="button" data-bs-target="#myCarousel-{{ $ann->id }}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                  <button type="button" data-bs-target="#myCarousel-{{ $ann->id }}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                  <button type="button" data-bs-target="#myCarousel-{{ $ann->id }}" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                  
                                </div> --}}
                                <div class="carousel-inner">
                                    @foreach ( $anno as $item )
                                        <div class="carousel-item active">
                                            <img src="{{ URL::to($item ) }}" alt="" width="100%" height="100%" >
                                        </div>
                                    @endforeach
                                        
                                        {{-- <div class="carousel-item ">
                                            <img src="" alt="" width="100%" height="100%" >
                                        </div>
                                        <div class="carousel-item ">
                                            <img src="" alt="" width="100%" height="100%" >
                                        </div> --}}
                                </div>
                        
                                {{-- <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel-{{ $ann->id }}" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel-{{ $ann->id }}" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button> --}}
                              </div>

                            <div class="card-body">
                                <h3 class="card-text">{{ $ann->title }}</h3>
                                <p class="card-text">{{ $ann->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

  

@endsection