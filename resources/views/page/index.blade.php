@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
        <a href="{{route('page.create')}}" class="btn btn-success">Add New</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Content</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>

  @foreach ($page as $page)
    <tr>
      <th scope="row">{{$page->title}}</th>
      <td>{{$page->slug}}</td>
      <td>{{$page->content}}</td>
      <td><img style="height: 150px; width: 150px;" src="/uploads/{{$page->image}}" /></td>
      <td><a href="{{route('page.edit', $page->id)}}" class="btn btn-success">Edit</a></td>
      <td>
          <div>
              <form action="{{route('page.destory', $page->id)}}" method="POST">
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