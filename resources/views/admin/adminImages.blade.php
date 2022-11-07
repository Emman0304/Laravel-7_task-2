@extends('admin.layouts')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin Images</title>
    </head>
    <body>
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your image.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('ann.imageSave') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Upload Picture</label>
                <input type="file" name="image" class="form-control" id="inputGroupFile01">
              </div>
              <div class="">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div><br>
              
              
        </form>
        <div class="table-responsive">
            <table style="width:100%" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($annImages as $images )
                        <tr>
                            <td> <img src="{{ url('/storage/image_ann/announcements/'.$images->images) }}" alt="" width="200px" height="200px" ></td>
                            <td><a class="btn btn-danger" href="{{URL::to('admin/delete/annImages/'.$images->id)}}" onclick="return confirm('confirm delete?')" >Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        
        
    </html>
@endsection