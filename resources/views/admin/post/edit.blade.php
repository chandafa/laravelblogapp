@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                Add Category
            </div>
            <div class="card-body">
                <form action="{{url('admin/posts/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Category</label>
<select class="form-select form-control @error('category_id') is-invalid @enderror"
                            name="category_id" aria-label="Default select example">
                            <option value="" selected>--Select Category--</option>
                            @foreach($categories as $key => $data)
                            <option value="{{$data->id}}" @if ($post->category_id == $data->id)
                                {{'selected="selected"'}} @endif >{{$data->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Post Title</label>
                        <input type="text" name="title" value="{{$post->title}}"
                            class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Post Image</label>
<input type="file" name="image" class="form-control">
                        @if($post->image == null)

                        @else
                        <div class="col-md-4 my-3">
                            <img class="img-fluid rounded" src="{{url('uploads/post/' .$post->image)}}">
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Post Content</label>
                        <textarea type="text" name="content"
                            class="form-control @error('content') is-invalid @enderror">{{$post->content}}</textarea>
                        @error('content')
                        <span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="1" id="flexRadioDefault1"
                                @if ($post->status == 1)
                            {{'checked="checked"'}} @endif
                            >
                            <label class="form-check-label" for="flexRadioDefault1">
                                Publish
                            </label>
</div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="0" id="flexRadioDefault2"
                                @if ($post->status == 0)
                            {{'checked="checked"'}} @endif>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Draft
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
</div>
        </div>
    </div>
</div>
@endsection
