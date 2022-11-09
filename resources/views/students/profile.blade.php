@extends('students.layouts')
@section('content')
<br><br>
<h1>Student Profile</h1><br>

<?php 
    if ($profile->mname == 'none') {
        $mi = "";
    } else {
        $mi = $profile->mname;
    }
    
?>

<img src="{{ url('/storage/image/students/'.$profile->image) }}" alt="" width="200px" height="200px" ><br><br>
    <h3>Application/Stdnt. # : {{ $profile->student_no }}</h3>
    <h3>Name: {{ $profile->fname}} {{$mi}} {{ $profile->lname }}</h3>
    <h3>Age: {{ $profile->age }}</h3>
    <h3>Gender: {{ $profile->gender }}</h3>
    <h3>Birthday: {{ $profile->bday }}</h3>
    <h3>Birth Place: {{ $profile->bplace }}</h3>
    <h3>Contact: {{ $profile->contact }}</h3>
    <h3>Email: {{ $profile->email }}</h3>
    <h3>Address: {{ $profile->address }}</h3> <br>

    <a href="{{ route('student.edit') }}" class="btn btn-primary">Edit Profile Info?</a>

@endsection