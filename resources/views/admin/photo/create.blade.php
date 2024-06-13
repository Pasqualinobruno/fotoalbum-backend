@extends('layouts.admin')

@section('content')
    <div class="jumbotron bg-dark text-white p-5 d-flex align-items-center justify-content-between">
        <h1>Create your photo</h1>
        <a class="btn btn-primary" href="{{ route('admin.photographys.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="container mt-2 ">
        @include('partials.error')

        <form action="{{ route('admin.photographys.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name photo <i class="fa-solid fa-camera"></i></label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="namehelper"
                    placeholder="Name photo" value="{{ old('name') }}" />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Choose photo <i class="fa-solid fa-camera"></i></label>
                <input type="file" class="form-control" name="image" id="image" aria-describedby="imagehelper"
                    placeholder="" />
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descriptiom</label>
                <textarea class="form-control" name="description" id="description" rows="4"
                    placeholder="Describe the moment of the photo">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="category_id" class="form-label">Category <i class="fa-solid fa-list"></i></label>
                <select class="form-select form-select-lg" name="category_id" id="category_id">
                    <option selected>Select one</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </select>
            </div>
            <div class="mb-3">
                <label for="upload_image" class="form-label">Upload Date <i class="fa-regular fa-calendar"></i></label>
                <input type="date" class="form-control" name="upload_image" id="upload_image"
                    aria-describedby="uploadImageHelp" value="{{ old('upload_image', date('Y-m-d')) }}" />
                @error('upload_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Name City <i class="fa-solid fa-city"></i></label>
                <input type="text" class="form-control" name="city" id="city" aria-describedby="cityhelper"
                    placeholder="Name City" value="{{ old('city') }}" />
                @error('city')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="evidence" id="evidence" value="1"
                    {{ old('evidence') ? 'checked' : '' }}>
                <label class="form-check-label" for="evidence">In Evidence</label>
            </div>

            <button type="submit" class="btn btn-primary align-items-end mb-3">
                Create <i class="fa-solid fa-image"></i>
            </button>
        </form>
    </div>
@endsection
