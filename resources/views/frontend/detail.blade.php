@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7 mx-auto">
        <h2 class="fw-bold fs-1">{{$post->title}}</h2>
        <p>{{$post->created_at}} </p>
        <img src="{{url('uploads/post/' .$post->image)}}" class="img-fluid rounded-4 my-3">
        <p class="lh-lg fs-5">
            {{$post->content}}
        </p>
        <span class="badge text-bg-success">{{$post->name}}</span>
        <h4 class="my-4">Related Post</h4>
        <div class="row">
            @foreach($relatedPost as $key => $post)

            <div class="col-md-4 mb-3">
                <div class="card rounded-4">
                    <div class="img-related">
                        <img src="{{url('uploads/post/' .$post->image)}}" class="card-img-top img-fluid rounded-top-4"
                            alt="{{$post->title}}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->description}}</p>
                        <p class="d-flex justify-content-between align-items-start">
                            <a href="{{url('post/'.$post->slug)}}" class="btn btn-primary">Read More...</a>
                            <span class="badge text-bg-success">{{$post->name}}</span>
                        </p>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
