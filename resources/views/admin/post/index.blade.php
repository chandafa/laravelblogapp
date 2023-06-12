@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 mx-auto">
        @if (session('message'))
        <div class="alert alert-success my-3">
            {{session('message')}}
        </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-start">
                <div>Post</div>
                <a href="{{url('admin/posts/create')}}" class="btn btn-primary btn-sm">Add Post</a>
</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>title</th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $i => $data)
                        <tr>
<th>{{$i+1}}</th>
                            <td>{{$data->title}}</td>
                            <td>{{$data->slug}}</td>
                            <td>{{$data->category_name}}</td>
                            <td>
                                @if($data->status == 1)
                                <span class="badge text-success bg-success-subtle">Publish</span>
                                @else
                                <span class="badge text-dark bg-dark-subtle">Draft</span>
                                @endif
                            </td>
                            <td>
<a href="{{url('admin/posts/edit/' .$data->id)}}"
                                    class="btn btn-primary btn-sm">edit</a>
                                @include('admin.post.delete')
                            </td>
                        </tr>
                        @empty
                        <th colspan="6" class="text-center">No Data Available</th>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <div class="card-body">
                {{ $posts->links() }}
            </div>
</div>
    </div>
</div>
@endsection
