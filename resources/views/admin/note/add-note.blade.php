@extends('admin.master');

@section('content');
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
                     @if(Session::has('note_added'))
                            <h6 class="alert alert-success"> {{ Session::get('note_added') }}</h6>
                        @endif
                        <div class="card-header"> 
                        <h4> Add new notice </h4>
                            <a href="{{ url('/all-note')}}" class="btn btn-danger float-end"> Back</a>
                        </div>
                        
                        <form action="{{route('note.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                            <label for="title">Grade</label>
                            <input type="text" class="form-control" name="grade"  placeholder="Enter title of sliders">
                            </div>
                            <div class="form-group">
                            <label for="link">Subject Name</label>
                            <input type="text" class="form-control" name="Sub_name"  placeholder="Enter title of sliders">
                            </div>
                            <div class="form-group">
                            <label for="file">choose file</label>
                            <input type="file" name="File_name" class="form-control" placeholder="file">
                            </div>

                            <div class="form-group">
                            <label for="textarea">Subject Description</label>
                            <textarea name="description">

                            </textarea>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


        </div>


    </div>

 
</div>

@endsection