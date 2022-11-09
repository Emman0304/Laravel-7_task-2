@extends('students.layouts')
@section('content')
<br><br>

<?php 
    if ($profile->mname == 'none') {
        $mi = "";
    } else {
        $mi = $profile->mname;
    }
    
?>

<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Student Profile</h1>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- Student Profile -->
<div class="student-profile py-4">
  
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img src="{{ url('/storage/image/students/'.$profile->image) }}" alt="" width="200px" height="200px"> 
            <h3>{{ $profile->fname}} {{$mi}} {{ $profile->lname }}</h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Student ID:</strong>{{ $profile->student_no }}</p>
            <p class="mb-0"><strong class="pr-1">Contact #:</strong>{{ $profile->contact }}</p>
            <p class="mb-0"><strong class="pr-1">Email:</strong>{{ $profile->email }}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">age</th>
                <td width="2%">:</td>
                <td>{{ $profile->age }}</td>
              </tr>
              <tr>
                <th width="30%">Birthday	</th>
                <td width="2%">:</td>
                <td>{{ $profile->bday }}</td>
              </tr>
              <tr>
                <th width="30%">Gender</th>
                <td width="2%">:</td>
                <td>{{ $profile->gender }}</td>
              </tr>
              <tr>
                <th width="30%">Birth Place</th>
                <td width="2%">:</td>
                <td>{{ $profile->bplace }}</td>
              </tr>
              <tr>
                <th width="30%">Address #</th>
                <td width="2%">:</td>
                <td>{{ $profile->address }}</td>
              </tr>
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
          </div>
          <div class="card-body pt-0">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
      </div>
    </div>
    <a href="{{ route('student.edit') }}" class="btn btn-primary">Edit Profile Info?</a>
  </div>
</div>
<!-- partial -->
           
    		</div>
		</div>
    
</section>
     
@endsection