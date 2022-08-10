<!---copy from the add.blade.php from the add@product, paste and edit-->
@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Edit/Update Products</h4>
  </div>
  <div class="card-body">
    <form action="{{url('update-product/'.$products->id)}}" method="post" enctype="multipart/form-data">
      @method('PUT')
      @csrf

        <div class="row">
            <!--New column created using bootstrap--->
            <div class="col-md-12  mb-3">
              <label for="">Category</label>
              <select class="form-select">
                <option value="">{{$products->category->name}}</option>
              </select>
            </div>


        <div class="col-md-6  mb-3">
          <label for="">Name</label>
          <input type="text" class="form-control" value="{{$products->name}}" name="name">
        </div>

        <div class="col-md-6 mb-3">
          <label for="">slug</label>
          <input type="text" class="form-control" value="{{$products->slug}}"  name="slug">
        </div>

        <div class="col-md-12 mb-3">
          <label for=""> Small Description</label>
          <textarea name=" small_description" rows="3" class="form-control">{{$products->small_description}}</textarea>
        </div>
        <div class="col-md-12 mb-3">
          <label for=""> Description</label>
          <textarea name="description" rows="3" class="form-control">{{$products->description}}</textarea>
        </div>

        <div class="col-md-6  mb-3">
          <label for="">Original Price</label>
          <input type="number" class="form-control" value="{{$products->original_price}}" name="original_price">
        </div>
        <div class="col-md-6  mb-3">
          <label for="">Selling Price</label>
          <input type="number" class="form-control"value="{{$products->selling_price}}" name="selling_price">
        </div>

        <div class="col-md-6  mb-3">
          <label for="">Tax</label>
          <input type="number" class="form-control" value="{{$products->tax}}" name="tax">
        </div>

        <div class="col-md-6  mb-3">
          <label for="">Quantity</label>
          <input type="number" class="form-control" value="{{$products->qty}}" name="qty">
        </div>

        <div class="col-md-6 mb-3">
          <label for="">Status</label>
          <input type="checkbox"  {{$products->status == '1' ? 'checked':''}}   name="status">
        </div>

        <div class="col-md-6 mb-3">
          <label for="">trending</label>
          <input type="checkbox" {{$products->trending == '1' ? 'checked':''}} name="trending">
        </div>

       <div class="col-md-6  mb-3">
         <label for="">Meta Title</label>
         <input type="text" class="form-control"  value="{{$products->meta_title}}" name="meta_title">
       </div>

       <div class="col-md-12 mb-3">
         <label for="">Meta Keywords</label>
         <textarea name="meta_keywords" rows="3" class="form-control">{{$products->meta_keywords}}</textarea>
       </div>

       <div class="col-md-12 mb-3">
         <label for="">Meta Description</label>
         <textarea name="meta_description" rows="3" class="form-control">{{$products->meta_description}}</textarea>
       </div>

       @if($products->image)

       <img src="{{asset('assets/uploads/product/'.$products->image)}}" style="width:200px; height:200px;  background-size:cover; background-position:center; " alt="product image">
       @endif
     <div class="col-md-12 mb-3">
       <label for="">image</label>
       <input type="file" class="form-control" name="image">
     </div>

       <div class="col-md-12 mb-3">
         <button type="submit" class="btn btn-primary">Update</button>
       </div>
      </div>
    </form>



  </div>

</div>

@endsection
