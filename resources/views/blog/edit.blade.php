@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
<div class="col-sm-12">

    @if ($errors->any())
    <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
</div>

        <div class="col-sm-6 offset-3">
        <form action="{{route('blog.update', $blog->id)}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title"  value="{{$blog->title}}">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug"  value="{{$blog->slug}}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3">{{$blog->content}}</textarea>
            </div>
            <div class="mb-3">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($blogcategory as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="Image" class="form-label">Image</label>
                <img style="height: 150px; width: 150px;" src="/uploads/{{$blog->image}}" />
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>


@endsection