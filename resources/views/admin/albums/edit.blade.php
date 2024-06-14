@extends('layouts.admin')
@section('content')
    <div class="jumbotron bg-dark text-white p-5 d-flex align-items-center justify-content-between">
        <h1>Edit Album {{ $album->name }}</h1>
        <a class="btn btn-primary" href="{{ route('admin.albums.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="container my-3">
        <form action="{{ route('admin.albums.update', $album) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name album <i class="fa-solid fa-book-open"></i></label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="namehelper"
                    placeholder="Name album" value="{{ old('name', $album->name) }}" />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="upload_album" class="form-label">Upload Date <i class="fa-regular fa-calendar"></i></label>
                <input type="date" class="form-control" name="upload_album" id="upload_album"
                    aria-describedby="uploadAlbumeHelp"
                    value="{{ old('upload_album', $album->upload_album ?? date('Y-m-d')) }}" />
                @error('upload_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary align-items-end mb-3">
                Edit <i class="fa-solid fa-image"></i>
            </button>
        </form>
    </div>
@endsection
