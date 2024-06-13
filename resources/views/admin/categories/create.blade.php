@extends('layouts.admin')
@section('content')
    <div class="jumbotron bg-dark text-white p-5 d-flex align-items-center justify-content-between">
        <h1>Create your categories</h1>
        <a class="btn btn-primary" href="{{ route('admin.photographys.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="container m-5 p-5">
        <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name Category </label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="namehelper"
                    placeholder="Name category" value="{{ old('name') }}" />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</i></label>
                <input type="text" class="form-control" name="slug" id="slug" aria-describedby="slughelper"
                    placeholder="Name slug" value="{{ old('slug') }}" />
                @error('slug')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary align-items-end my-3">
                Create <i class="fa-solid fa-image"></i>
            </button>
        </form>
    </div>
@endsection
<style>
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>
