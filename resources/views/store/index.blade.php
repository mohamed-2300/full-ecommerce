@extends('base')
@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center">
  <h1 class="mt-3">Products</h1>
  
  <div class="d-flex align-items-center">
 <a href="{{route('categories.index')}}" class="btn mx-2 btn-primary">CRUD Category</a>
 <a href="{{route('products.index')}}" class="btn btn-primary">CRUD product</a></div>
</div>




<div class="d-flex mt-3 items-content-center justify-content-center">
@foreach($products as $product)


<div class="card m-2" style="width: 22rem;">
  <img src="storage/{{$product->image}} " alt="image" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <p class="card-text">{!!$product->description!!}</p>
    <hr />
    <div class="d-flex justify-content-between">
      <div>Quantity : <span class="badge bg-success">{{$product->quantity}}</span></div>
      <div>Price : <span class="badge bg-primary">{{$product->price}} MAD</span></div>
    </div>
    <hr />
    <div class="my-2" >Category : <span class="badge bg-primary">{{$product->category?->name}}</span></div>
    </div>
    <div class="card-footer">
      <small class="text-muted">{{$product->created_at}} </small>
    </div>
</div>


@endforeach
</div>

@endsection