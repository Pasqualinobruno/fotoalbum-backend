@extends('layouts.admin')
@section('content')
    <div class="jumbotron bg-dark text-white p-5 d-flex align-items-center justify-content-between">
        <h1>Edit Category {{ $category->name }}</h1>
        <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="container my-3">
        <form action="{{ route('admin.categories.update', $category) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name category</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="namehelper"
                    placeholder="Name category" value="{{ old('name', $category->name) }}" />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</i></label>
                <input type="text" class="form-control" name="slug" id="slug" aria-describedby="slughelper"
                    placeholder="Name slug" value="{{ old('slug', $category->slug) }}" />
                @error('slug')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary align-items-end mb-3">
                Edit <i class="fa-solid fa-image"></i>
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
