@extends('base')
@section('title', 'Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center">
  <h1 class="mt-3">{{$category->name}} Category</h1>
  
  <div class="d-flex justify-content-between align-items-center gap-3">
 <a href="{{route('products.index')}}" class="btn btn-primary">CRUD Product</a>
 <a href="{{route('categories.create')}}" class="btn btn-primary">Create Category</a>
 <a href="{{route('categories.index')}}" class="btn btn-primary">Go Back</a></div>
</div>
<table class="table table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
@foreach($products as $product)
    <tr>
        <td> {{$product->id}} </td>
        <td> {{$product->name}} </td>
        <td>
          <div class="d-flex gap-2">
            <a href="{{route('products.edit', $product)}}" class="btn btn-primary">edit</a>
          </div>
        </td>

    </tr>
@endforeach
 
  </tbody>
</table>

@endsection