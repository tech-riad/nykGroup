@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
        <a href="{{route('blogcategory.create')}}" class="btn btn-success">Add New</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Slug</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>

  @foreach ($blogcategory as $blogcategory)
    <tr>
      <th scope="row">{{$blogcategory->name}}</th>
      <td>{{$blogcategory->slug}}</td>
      <td><a href="{{route('blogcategory.edit', $blogcategory->id)}}" class="btn btn-success">Edit</a></td>
      <td>
          <div>
              <form action="{{route('blogcategory.destory', $blogcategory->id)}}" method="POST">
                 @csrf
                 @method('DELETE')
                 <input type="submit" value="Delete" class="btn btn-danger" />
              </form>
          </div>
      </td>
      
    </tr>
 @endforeach
    
  </tbody>
</table>
        </div>
    </div>
</div>




@endsection