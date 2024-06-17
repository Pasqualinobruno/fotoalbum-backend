@extends('layouts.admin')
@section('content')
    <div class="jumbotron bg-dark text-white p-5 d-flex align-items-center justify-content-between">
        <h1>Photographys {{ $photography->name }}</h1>
        <div>
            <a class="btn btn-primary" href="{{ route('admin.photographys.index') }}">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <a class="btn btn-primary" href="{{ route('admin.photographys.edit', $photography) }}">
                <i class="fa-solid fa-pencil-alt"></i> Edit
            </a>
        </div>
    </div>
    <div class="container p-3 mb-2">

        <h2 class="text-center">{{ $photography->name }}</h2>
        <div class="container d-flex gap-4">
            @if (Str::startsWith($photography->image, 'https://'))
                <img height="500" width="400" loading='lazy' src="{{ $photography->image }}" alt="">
            @else
                <img height="500" width="400" loading='lazy' src="{{ asset('storage/' . $photography->image) }}"
                    alt="">
            @endif


            <ul class="list-unstyled">
                <li><strong>Description:</strong> {{ $photography->description ?: 'No description' }}</li>
                <hr>
                <li><strong>Category:</strong> <span class="badge bg-primary">
                        {{ $photography->category ? $photography->category->name : 'Uncategorize' }} </span>
                </li>
                <li>
                    <div class="albums">
                        <strong>Albums:</strong>
                        @forelse ($photography->albums as $album)
                            <span class="badge bg-dark"> {{ $album->name }}</span>
                        @empty
                            <span class="badge bg-dark">No Album</span>
                        @endforelse
                    </div>
                </li>
                <li><strong>Upload:</strong> {{ $photography->upload_image }}</li>

                <li><strong>City:</strong> {{ $photography->city ?: 'No city' }}</li>

                <li><strong>In evidence:</strong> {{ $photography->evidence == 0 ? 'Sì' : 'No' }}</li>
            </ul>
        </div>
    </div>
@endsection
