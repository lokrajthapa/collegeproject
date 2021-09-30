@extends('admin.master');

@section('content');
<div class="container">
  <div class="col-md-12">
      @if(session('status'))
          <h6 class="alert alert-success"> {{ session('status') }}</h6>
       @endif
       <div class="card-header"> 
        <h4> Edit sliders </h4>
        <a href="{{ url('sliderimages')}}" class="btn btn-danger float-end"> Back</a>
       </div>

      <form action="{{ url('update-sliderimage/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      
       
        <div class="form-group">
          <label for="title">slider title</label>
          <input type="text" class="form-control" name="title" value="{{($slider->title)}}" placeholder="Enter title of sliders">
          
        </div>
        <div class="form-group">
          <label for="file">Slider image</label>
          <input type="file" class="form-control" name="slider_image" >
          <img src="{{ asset('uploads/sliders/'.$slider->slider_image)  }}" width="70px" height="70px" alt="image"> 
 
          
        </div>
      
        <button type="submit" class="btn btn-primary"> Update sliders </button>
      </form>
  </div>
</div>
  @endsection