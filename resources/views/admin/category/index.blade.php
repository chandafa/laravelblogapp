@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
        <div class="card-header bg-white d-flex justify-content-between align-items-start">
            <h4>Category</h4>
            <a href="{{url('admin/categories/create')}}" class="btn btn-primary">Add Category</a>
        </div>
<table class="table table-striped">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $i => $data)
                <tr>
                    <th>{{$i+1}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->slug}}</td>
                    <td>
<a href="{{url('admin/categories/edit/' .$data->id)}}" class="btn btn-primary">edit</a>
                        @include('admin.category.delete')
                    </td>
                </tr>
                @empty
                <th colspan="4" class="text-center">No Data Available</th>
                @endforelse

            </tbody>
        </table>

        <div class="card-body">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
