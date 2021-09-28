@extends('admin.master')

@section('content')
<div class="container">
  <div class="col-md-12">
    <a href="{{ url('add-sliderimage') }}" class="btn-btn primary float-end"> add new slideImage</a>
      
    <table class="table">
              <thead class="thead-dark">
                <tr>
                  
                  <th scope="col">id</th>
                  <th scope="col">title</th>
                  <th scope="col">image</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>
                
              @foreach($slider as $item)
                <tr>
                  
                  <td>{{$item->id}}</td>
                  <td>{{$item->title}}</td>
                  <td>
                    <img src="{{ asset('uploads/sliders/'.$item->slider_image)  }} " width="70px" height="70px" alt="image"> 
                  </td>
                  <td> 
                    <a href="{{ url('edit-sliderimage/'.$item->id)}}" class="btn btn-primary btn-sm">  Edit </a>
                    <a href="" class="btn btn-danger btn-sm">  Delete </a>


                  </td>

                </tr>
               @endforeach 
              </tbody>
</table>


  </div>
</div> 
@endsection