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
<form action="{{ route('save_ann') }}" method="post" enctype="multipart/form-data" >
    @csrf
    
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" placeholder="" name="content" id="floatingTextarea"></textarea>
      </div>
   
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  @endsection