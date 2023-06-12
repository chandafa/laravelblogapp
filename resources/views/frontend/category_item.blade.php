@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
            </ol>
        </nav>
        @forelse($posts as $key => $post)

        <div class="col-md-4 mb-3">
            <div class="card rounded-4">
                <div class="img-frame">
                    <img src="{{url('uploads/post/' .$post->image)}}" class="card-img-top img-fluid rounded-top-4"
                        alt="{{$post->title}}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                    <a href="{{url('post/'.$post->slug)}}" class="btn btn-primary">Read More...</a>
                </div>
            </div>
        </div>

        @empty
        <div class="text-center">
            No Post Available
        </div>
        @endforelse
        <div class="my-4">
            {!! $posts->links() !!}
        </div>
    </div>
</div>

@endsection
