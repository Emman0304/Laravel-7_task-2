@extends('students.layouts')
@section('content')
  <br><br>
<h1>Student Dashboard</h1>
  <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container p-3 mb-2 bg-light text-dark">
                <h1></h1>
                <div class="row justify-content-center p-3">
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="card">
                            <div>
                                <div class="d-flex justify-content-between">
                                    <div><b>la crepe dentelle</b><br> Paris, France</div>
                                    <div>12/14</div>
                                </div>
                            </div>
                                <img src="https://p0.ipstatp.com/large/tos-maliva-p-0000/72e2c976254a42c0bc7a74bda4d06eab" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title">47 likes</h6>
                                <p class="card-text">Best crepes in the world here in the romance capital</p>
                                <div class="d-flex justify-content-between">
                                    <div><i class="far fa-heart"></i>
                                        <a href="#" class="btn btn-primary">Comment..</a>
                                    </div>
                                    <div>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection