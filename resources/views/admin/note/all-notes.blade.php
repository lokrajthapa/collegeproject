@extends('admin.master');

@section('content');
<section  class="container">     
       <div class="row ">
                <div class="col-lg-9 margin-tb">
                    <div class="pull-left">
                        <h2>all Notes </h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="/add-notes"> Add New notes</a>
                    </div>
                </div>
            </div>
            @if(Session::has('note_deleted'))
                            <h6 class="alert alert-success"> {{ Session::get('note_deleted') }}</h6>
                        @endif
            
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Grade</th>
                    <th>Subject Name</th>
                    <th>Description</th>
                    <th>Files</th>

                    
                    <th width="280px">Action</th>
                </tr>
                @foreach (  $notes as $note)
                <tr>
                    <td>{{ $note->id }}</td>
                    <td> {{ $note->grade }} </td>
                    <td> {{ $note->Sub_name }} </td>
                    <td> {{ $note->description }} </td>

                    <td>{{ $note->File_name }}</td>
                    <td> 
                        <a href="/edit-notes/{{$note->id}}" class="btn btn-info ">Edit </a>
                        <a href="/delete-note/{{$note->id}}" class="btn btn-danger ">Delete </a>


                    </td>
                    
                   
                 
                </tr>
                @endforeach
            </table>
</div>
</section>
@endsection