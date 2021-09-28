@extends('admin.master');

@section('content');
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
                     @if(Session::has('notice_added'))
                            <h6 class="alert alert-success"> {{ Session::get('notice_added') }}</h6>
                        @endif
                        <div class="card-header"> 
                        <h4> Add new notice </h4>
                            <a href="{{ url('')}}" class="btn btn-danger float-end"> Back</a>
                        </div>
                        
                        <form action="{{route('notice.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" class="form-control" name="title"  placeholder="Enter title of sliders">
                            </div>
                            <div class="form-group">
                            <label for="link">link</label>
                            <input type="text" class="form-control" name="link"  placeholder="Enter title of sliders">
                            </div>
                            <div class="form-group">
                            <label for="image">image</label>
                            <input type="file" name="image" class="form-control" placeholder="image" onchange="previewFile(this)">
                            <img id="previewImg" alt="image" style="max-width:130px;margin-top:20px;">
                            </div>

                            <div class="form-group">
                            <label for="textarea">textarea</label>
                            <textarea name="text">

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