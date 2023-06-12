@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                Edit Category
            </div>
            <div class="card-body">
                <form action="{{url('admin/categories/'.$category->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Category name</label>
<input type="text" name="name" value="{{$category->name}}"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
