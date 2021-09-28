@extends('admin.master');

@section('content'); 
 
 <section class="container">
      <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Product</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('gallery.index') }}"> Back</a>
                    </div>
                </div>
        <div>
     
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
            
            <form action="{{ route('gallery.update',$gallery->id) }}" method="POST" enctype="multipart/form-data"> 
                @csrf
                @method('PUT')
            
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ $gallery->name }}" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="file" name="image" class="form-control" placeholder="image">
                             <img src="uploads/gallery/{{ $gallery->image }} " width="100px">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            
            </form>

    </section> 
   @endsection         