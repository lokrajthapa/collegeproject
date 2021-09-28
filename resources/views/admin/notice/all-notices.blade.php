@extends('admin.master');

@section('content');
<section  class="container">     
       <div class="row ">
                <div class="col-lg-9 margin-tb">
                    <div class="pull-left">
                        <h2>all Notices </h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="/add-notices"> Create New notice</a>
                    </div>
                </div>
            </div>
            @if(Session::has('notice_deleted'))
                            <h6 class="alert alert-success"> {{ Session::get('notice_deleted') }}</h6>
                        @endif
            
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>title</th>
                    <th>link</th>
                    <th>text</th>
                    <th>images</th>

                    
                    <th width="280px">Action</th>
                </tr>
                @foreach (  $notices as $notice)
                <tr>
                    <td>{{ $notice->id }}</td>
                    <td> {{ $notice->title }} </td>
                    <td> {{ $notice->link }} </td>
                    <td> {{ $notice->text }} </td>

                    <td><img src="uploads/notice/{{ $notice->image }}" width="100px"></td>
                    <td> 
                        <a href="/edit-notices/{{$notice->id}}" class="btn btn-info ">Edit </a>
                        <a href="/delete-notice/{{$notice->id}}" class="btn btn-danger ">Delete </a>


                    </td>
                    
                   
                 
                </tr>
                @endforeach
            </table>
</div>
</section>
@endsection