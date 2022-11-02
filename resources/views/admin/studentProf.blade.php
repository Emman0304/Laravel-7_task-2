@extends('admin.layouts')
@section('content')
    <h1>STUDENT PROFILE</h1>
   
              <div class="card-body p-5 bg-white rounded">
                <div class="table-responsive">
                  <table id="example" style="width:100%" class="table table-striped table-bordered">
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
                            <td>{{ $student->image }}</td>
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
              </div>
              
            
      

@endsection
