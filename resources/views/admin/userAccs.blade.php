@extends('admin.layouts')
@section('content')
<div class="container">
    @if ($errors->any())
      <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">  
            <p>{{ $message }}</p>
        </div>
    @endif
</div>
{{-- <div class="container"> --}}
    <form name="myForm" id="myForm" action="/admin/save" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" >
      @csrf

      <div class="container">
        <h1>Create New Application</h1>
          <button 
              type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Add another Admin Account?
          </button>
      </div>

      

      <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupFile01">Upload Picture</label>
        <input type="file" name="image" class="form-control" id="inputGroupFile01">
      </div>
      
      <div class="row">
        <div class="col-25">
          <label for="fname">First Name</label>
        </div>
        <div class="col-75">
            <input type="text" id="firstname" name="firstname" placeholder="Firstname" minlength="3" maxlength="50">
          <span class="error_form" id="fname_error_message"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Last Name</label>
        </div>
        <div class="col-75">
            <input type="text" id="lastname" name="lastname" placeholder="Lastname" minlength="2" maxlength="50" >
          <span class="error_form" id="lname_error_message"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
            <label for="mname">Middle Name  type (none) if unavailable</label>
          </div>
          <div class="col-75">
            <input type="text" id="mname" name="mname" value="" placeholder="Your middle name.." minlength="1" maxlength="30" >
            <span class="error_form" id="mname_error_message"></span>
          </div>
      </div>
      
      <div class="row">
        <div class="col-25">
          <label for="gender">Gender</label>
        </div>
        <div class="col-75">
            <select id="gender" name="gender">
              <option value="Other">Other</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              
            </select>
        </div>
    </div>
      <div class="row">
        <div class="col-25">
            <label for="bday">Birthday</label>
          </div>
          <div class="col-75">
            <input  class="bday" type="text" id="bday" name="bday" value="" >
          </div>
      </div>
      <div class="row">
        <div class="col-25">
            <label for="age">Age</label>
          </div>
          <div class="col-75">
            <input type="number" id="age" name="age" placeholder="Your age." style="width: 50%" readonly  >
            <span class="error_form" id="age_error_message"></span>
          </div>
      </div>
      
      <div class="row">
        <div class="col-25">
          <label for="bplace">Birtplace</label>
        </div>
        <div class="col-75">
          <input type="text" id="bplace" name="bplace" placeholder="Your birthplace.">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="bplace">Contact</label>
        </div>
        <div class="col-75">
          <input type="number" id="contact" name="contact" placeholder="09xxxxxxxx" minlength="11" maxlength="11" >
        </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="address">Address</label>
        </div>
        <div class="col-75">
          <input type="text" id="address" name="address" placeholder="Your address.">
        </div>
      </div>
      <div class="row">
          <div class="col-25">
            <label for="email">Email</label>
          </div>
          <div class="col-75">
            <input type="text" id="email" name="email" placeholder="Your email">
            <span class="error_form" id="email_error_message"></span>
          </div>
      </div><br>
      
      <div class="row">
        <input type="submit" value="Submit">
      </div>

      
    </form>

    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Admin Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form  action="{{ route('createAdmin') }}" method="post" enctype="multipart/form-data" >
          @csrf
          <div class="modal-body">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control" id="exampleInputPassword1">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </form>
    </div>
  </div>
</div>

  {{-- </div> --}}
@endsection
