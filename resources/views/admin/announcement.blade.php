@extends('admin.layouts')
@section('content')
        
        <h1>ANNOUNCEMENTS</h1>
        <a href="{{ route('create_ann') }}" class="btn btn-primary" >Create New Announcements</a><br><br>
        <div class="table-responsive">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table style="width:100%" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image/s</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($announcements as $ann)
                        @php
                            $anno=explode('|',$ann->images);
                        @endphp
                        <tr>
                            
                            <td>{{ $ann->title }}</td>
                            <td>{{ $ann->content }}</td>
                            <td> 
    
                                @foreach ( $anno as $item)
                                   <img src="{{ URL::to($item) }}" alt="" width="70px" height="70px"> 
                                @endforeach
                                
                            </td>
                            <td> 
                                <a class="btn btn-primary" href="{{URL::to('admin/edit/announcement/'.$ann->id)}}">Edit</a>
                                <a class="btn btn-danger" href="{{URL::to('admin/delete/announcement/'.$ann->id)}}" onclick="return confirm('confirm delete?')" >Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                
            </table>
            {!! $announcements->links() !!}
        
    </div>
    
@endsection
