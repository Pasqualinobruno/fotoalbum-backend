@extends('layouts.admin')

@section('content')
    <div class="jumbotron bg-dark text-white p-5 d-flex align-items-center justify-content-between">
        <h1>Edit Photo {{ $photography->name }}</h1>
        <a class="btn btn-primary" href="{{ route('admin.photographys.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="container mt-2 ">
        @include('partials.error')

        <form action="{{ route('admin.photographys.update', $photography) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name photo <i class="fa-solid fa-camera"></i></label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="namehelper"
                    placeholder="Name photo" value="{{ old('name', $photography->name) }}" />
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
                    placeholder="Describe the moment of the photo">{{ old('description', $photography->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category <i class="fa-solid fa-list"></i></label>
                <select class="form-select form-select-lg" name="category_id" id="category_id">
                    <option>Select one</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $photography->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="albums_id" class="form-label">Albums select <i class="fa-solid fa-book-open"></i></label>
                <div class="mb-3 d-flex gap-3">
                    @foreach ($albums as $album)
                        <div class="form-check">

                            @if ($errors->any())
                                <input class="form-check-input" type="checkbox" value="{{ $album->id }}"
                                    id="album-{{ $album->id }}" name="albums[]"
                                    {{ in_array($album->id, old('albums', [])) ? 'checked' : '' }} />
                            @else
                                <input class="form-check-input" type="checkbox" value="{{ $album->id }}"
                                    id="album-{{ $album->id }}" name="albums[]"
                                    {{ $photography->albums->contains($album->id) ? 'checked' : '' }} />
                            @endif
                            <label class="form-check-label" for="albums"> {{ $album->name }} </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="upload_image" class="form-label">Upload Date <i class="fa-regular fa-calendar"></i></label>
                <input type="date" class="form-control" name="upload_image" id="upload_image"
                    aria-describedby="uploadImageHelp"
                    value="{{ old('upload_image', $photography->upload_image ?? date('Y-m-d')) }}" />
                @error('upload_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Name City <i class="fa-solid fa-city"></i></label>
                <input type="text" class="form-control" name="city" id="city" aria-describedby="cityhelper"
                    placeholder="Name City" value="{{ old('city', $photography->city) }}" />
                @error('city')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="evidence" id="evidence" value="1"
                    {{ old('evidence') == 1 || ($photography->evidence ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="evidence">In Evidence</label>
            </div>

            <button type="submit" class="btn btn-primary align-items-end mb-3">
                Edit <i class="fa-solid fa-image"></i>
            </button>
        </form>
    </div>
@endsection
