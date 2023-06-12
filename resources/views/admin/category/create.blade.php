@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-6 mx-auto">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{url('admin/categories')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Category name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
