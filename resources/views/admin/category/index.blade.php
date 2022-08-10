@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Category Page</h4>
    <hr>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Description</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
       @foreach($category as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->description}}</td>
          <td>
            <img src="{{asset('assets/uploads/Category/'.$item->image)}}" alt="Image here" style="width:150px; height:150px;  background-size:cover; background-position:center;">
          </td>

          <td>
             <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-primary btn-lg">Edit</a>
            <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-danger btn-lg delete-confirm">Delete</a>
          </td>

        </tr>
       @endforeach
      </tbody>

    </table>




  </div>

</div>

@endsection
