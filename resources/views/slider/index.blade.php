@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <div class="col-sm-6">
        <a href="{{route('slider.create')}}" class="btn btn-success">Add New</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Image Title</th>
      <th scope="col">Description</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>

  @foreach ($slider as $slider)
    <tr>
      <td><img style="height: 150px; width: 150px;" src="/uploads/sliderimages/{{$slider->image}}" /></td>
      <td>{{$slider->imagetitle}}</td>
      <td>{{$slider->description}}</td>
      <td><a href="{{route('slider.edit', $slider->id)}}" class="btn btn-success">Edit</a></td>
      <td>
          <div>
              <form action="{{route('slider.destory', $slider->id)}}" method="POST">
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