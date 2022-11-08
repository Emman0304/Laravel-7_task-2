@extends('admin.layouts')
@section('content')
<div class="container">
  <h1>STUDENT PROFILE</h1>
  {{-- <div class="card-body p-5 bg-white rounded"> --}}
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
    @if (session()->has('failures'))
        <table class="table table-danger" > 
            <tr>
                <th>Row</th>
                <th>Attribute</th>
                <th>validations</th>
                <th>Value</th>
            </tr>
            @foreach (session()->get('failures') as $validation )
                <tr>
                    <td>{{ $validation->row() }}</td>
                    <td>{{ $validation->attribute() }}</td>
                    <td>
                        <ul>
                            @foreach ($validation->errors() as $e )
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{ $validation->values()[$validation->attribute()] }}
                    </td>
                </tr>
                
            @endforeach
        </table>
    @endif
    
  
    <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
      @csrf
              
              <div class="container">
                  <input type="file" name="excel" class="form-control" ><br>
                  <button type="submit" class="btn btn-primary">Import Excel File</button>
                  <a class="btn btn-success"  href="{{ route('export') }}"> Export Excel</a><br>
              </div>
             
    
    </form>
    
      
      
    <div class="table-responsive">
      <table id="student_list" style="width:100%" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Image</th>
            <th>Stdnt. No.</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>M.I.</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Birth Date</th>
            <th>Birth Place</th>
            <th>Contact #</th>
            <th>Email</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student )
                <tr>
                  <td> <img src="{{ url('/storage/image/students/'.$student->image) }}" alt="" width="70px" height="70px" > 
                </td>
                <td>{{ $student->student_no }}</td>
                <td>{{ $student->lname }}</td>
                <td>{{ $student->fname }}</td>
                <td>{{ $student->mname }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->bday }}</td>
                <td>{{ $student->bplace }}</td>
                <td>{{ $student->contact }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->address }}</td>
              </tr>
          @endforeach
          
        </tbody>
      </table>
      {!! $students->links() !!}
    </div>
  {{-- </div> --}}
</div>
    
              
            
      

@endsection
