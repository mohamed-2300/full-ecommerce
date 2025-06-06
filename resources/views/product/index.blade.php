@extends('base')
@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center">
<h1 class="mt-3">Products List</h1>
 <a href="{{route('products.create')}}" class="btn btn-primary">Create Product</a>
</div>
<table class="table table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach($products as $product)
    <tr>
        <td> {{$product->id}} </td>
        <td> {{$product->name}} </td>
        <td> {{$product->description}} </td>
        <td> {{$product->quantity}} </td>
        <td> <img width="100px" src="storage/{{$product->image}} " alt="image"></td>
        <td> {{$product->price}} MAD</td>
        <td>
          <div class="d-flex">
            <a href="{{route('products.edit', $product)}}" class="btn btn-primary">edit</a>
            <form method="post" action="{{route('products.destroy',$product)}}">
              @csrf
              @method('DELETE')
            <input type="submit" class="btn btn-danger" value="delete" />
            </form>
          </div>
        </td>

    </tr>
@endforeach
 
  </tbody>
</table>
{{$products->links()}}

@endsection