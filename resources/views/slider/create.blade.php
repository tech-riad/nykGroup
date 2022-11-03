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
        <form action="{{route('slider.store')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="Image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="imagetitle" class="form-label">Image Title</label>
                <input type="text" class="form-control" name="imagetitle" id="imagetitle"  value="{{@old('title')}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{@old('content')}}</textarea>
            </div>
            

            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>


@endsection