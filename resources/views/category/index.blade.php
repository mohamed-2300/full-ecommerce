@extends('base')
@section('title', 'Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center">
<h1 class="mt-3">Category List</h1>
 <a href="{{route('categories.create')}}" class="btn btn-primary">Create Category</a>
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
@foreach($categories as $category)
    <tr>
        <td> {{$category->id}} </td>
        <td> {{$category->name}} </td>
        <td>
          <div class="d-flex">
            <a href="{{route('categories.edit', $category)}}" class="btn btn-primary">edit</a>
            <form method="post" action="{{route('categories.destroy',$category)}}">
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

@endsection