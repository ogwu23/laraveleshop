<!---copy from the index.blade.php from the index@category, paste and edit-->

@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Product Page</h4>
    <hr>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Category</th>
          <th>Name</th>
          <th>Selling Price</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
       @foreach($products as $item)
        <tr>
          <td>{{$item->id}}</td>
          <!--this category->name is the function name from the product
           Table-->
          <td>{{$item->category->name}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->selling_price}}</td>
          <td>
            <img src="{{asset('assets/uploads/product/'.$item->image)}}" alt="Image here" style="width:100px; height:100px;">
          </td>

          <td>
             <a href="{{url('edit-prod/'.$item->id)}}" class="btn btn-primary">Edit</a>
            <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-danger">Delete</a>
          </td>

        </tr>
       @endforeach
      </tbody>

    </table>




  </div>

</div>

@endsection
