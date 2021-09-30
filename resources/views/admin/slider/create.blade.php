@extends('admin.master');

@section('content');
<div class="container">
  <div class="col-md-12">
      @if(session('status'))
          <h6 class="alert alert-success"> {{ session('status') }}</h6>
       @endif
       <div class="card-header"> 
       <h4> Add new Slider </h4>
        <a href="{{ url('sliderimages')}}" class="btn btn-danger float-end"> Back</a>
       </div>
    
      <form action="{{  ('add-sliderimage')}}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
          <label for="title">slider title</label>
          <input type="text" class="form-control" name="title"  placeholder="Enter title of sliders">
          
        </div>
        <div class="form-group">
          <label for="file">Slider image</label>
          <input type="file" class="form-control" name="slider_image" >
          
        </div>
      
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
  @endsection