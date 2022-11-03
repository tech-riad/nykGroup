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
        <form action="{{route('page.update', $page->id)}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title"  value="{{$page->title}}">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug"  value="{{$page->slug}}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3">{{$page->content}}</textarea>
            </div>
            <div class="mb-3">
                <label for="Image" class="form-label">Image</label>
                <img style="height: 150px; width: 150px;" src="/uploads/{{$page->image}}" />
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>


@endsection