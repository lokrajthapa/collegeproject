@extends('admin.master');

@section('content');
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
                     @if(Session::has('note_updated'))
                            <h6 class="alert alert-success"> {{ Session::get('note_updated') }}</h6>
                        @endif
                        <div class="card-header"> 
                        <h4> Edit note </h4>
                            <a href="{{ url('/all-notes')}}" class="btn btn-danger float-end"> Back</a>
                        </div>
                        
                        <form action="{{route('note.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $note->id }}" />
                            <div class="form-group">
                            <label for="title">Grade</label>
                            <input type="text" class="form-control" name="grade" value="{{$note->grade}}" placeholder="Enter title of sliders">
                            </div>
                            <div class="form-group">
                            <label for="link">link</label>
                            <input type="text" class="form-control" name="Sub_name" value="{{$note->Sub_name}}"  placeholder="Enter title of sliders">
                            </div>
                            <div class="form-group">
                            <label for="file">file</label>
                            <input type="file" name="File_name" value="{{$note->File_name}}" class="form-control" placeholder="file">
                            
                            </div>

                            <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" value="{{ $note->description }}">

                            </textarea>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


        </div>


    </div>

 
</div>
<script> 
  function previewFile(input)
  {
      var file=$("input[type=file]").get(0).files[0];
      if(file)
      {
          var reader= new FileReader();
          reader.onload = function()
          {
              $('#previewImg').attr("src",reader.result);

          }
          reader.readAsDataURL(file);
      }
  }
</script>
@endsection