@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Content</th>
      <th scope="col">Category Id</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>

  @foreach ($blog as $blog)
    <tr>
      <th scope="row">{{$blog->title}}</th>
      <td>{{$blog->slug}}</td>
      <td>{{$blog->content}}</td>
      <td>{{$blog->category_id}}</td>
      <td><img style="height: 150px; width: 150px;" src="/uploads/{{$blog->image}}" /></td>
      <td><a href="{{route('blog.edit', $blog->id)}}" class="btn btn-success">Edit</a></td>
      <!-- <td><a href="{{route('blog.destory', $blog->id)}}" class="btn btn-danger">Delete</a></td> -->
      <td>
          <div>
              <form action="{{route('blog.destory', $blog->id)}}" method="POST">
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