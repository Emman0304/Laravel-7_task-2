@extends('admin.layouts')
@section('content')
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
<form action="{{URL::to('admin/saveEdit/announcement/'.$ann->id)}}" method="post" enctype="multipart/form-data" >
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" value="{{ $ann->title }}" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        {{-- <textarea class="form-control" placeholder="" type="text"  name="content" id="floatingTextarea" ></textarea> --}}
        <input type="text" name="content" value="{{ $ann->content }}" id="content" class="form-control" >
      </div>
   
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  @endsection