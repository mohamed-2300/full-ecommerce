@extends('base')
@section('title', ($isUpdate ? 'Edit' : 'Create').' Product')

@php
  $route = route('products.store');
  if($isUpdate){
    $route = route('products.update' , $product);
}

@endphp

@section('content')

<h1 class="mt-3">@yield('title')</h1>


<form action="{{$route}}" method="post" enctype="multipart/form-data">
@csrf
@if($isUpdate)
@method('PUT')
@endif
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="name" value="{{@old('name',$product->name)}}">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" name="description" class="form-control" id="description" value="{{@old('description',$product->description)}}">
  </div>
  <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="quantity" value="{{@old('quantity',$product->quantity)}}">
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" name="image" class="form-control" id="image">
    @if($product->image)

    <img width="100px" src="/storage/{{$product->image}} " alt="image">
    @endif
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" id="price" value="{{old('price',$product->price)}}">
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Category</label>


    <select name="category_id" class="form-control" id="category">

      <option value="">Choose your option</option>
      @foreach($categories as $category)

          <option @selected(old('category_id', $product->category_id) === $category->id) value="{{ $category->id }}"> 
            {{ $category->name }} 
          </option>

      @endforeach
    </select>


  </div>

  <button type="submit" class="btn btn-primary">{{$isUpdate ? 'Edit' : 'Create'}}</button>
</form>

@endsection