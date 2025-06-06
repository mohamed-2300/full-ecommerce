@extends('base')
@section('title', ($isUpdate ? 'Edit' : 'Create').' category')

@php
  $route = route('categories.store');
  if($isUpdate){
    $route = route('categories.update' , $category);
}

@endphp

@section('content')

<h1 class="mt-3">@yield('title')</h1>


<form action="{{$route}}" method="post">
@csrf
@if($isUpdate)
@method('PUT')
@endif
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="name" value="{{@old('name',$category->name)}}">
  </div>
  <button type="submit" class="btn btn-primary">{{$isUpdate ? 'Edit' : 'Create'}}</button>
</form>

@endsection