@extends('admin.master')

@section('content')
  <section  class="container">     
       <div class="row ">
                <div class="col-lg-9 margin-tb">
                    <div class="pull-left">
                        <h2></h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('gallery.create') }}"> Create New Product</a>
                    </div>
                </div>
            </div>
            
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    
                    <th width="280px">Action</th>
                </tr>
                @foreach (  $galleries as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img src="uploads/gallery/{{ $item->image }}" width="100px"></td>
                    <td>{{ $item->name }}</td>
                   
                    <td>
                        <form action="{{ route('gallery.destroy',$item->id) }}" method="POST">
            
                            
            
                            <a class="btn btn-primary" href="{{ route('gallery.edit',$item->id) }}">Edit</a>
            
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
</div>
</section>
            
@endsection