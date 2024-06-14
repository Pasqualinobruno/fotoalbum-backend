@extends('layouts.admin')
@section('content')
    <div class="jumbotron bg-dark text-white p-5 d-flex align-items-center justify-content-between">
        <h1>Albums {{ $album->name }}</h1>
        <a class="btn btn-primary" href="{{ route('admin.albums.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="container p-3">
        <h2 class="text-center mb-3">{{ $album->name }}</h2>
        <div class="container d-flex gap-4 flex-wrap">
            @foreach ($album->photographies as $photography)
                <div class="card" style="width: 18rem;">
                    @if (Str::startsWith($photography->image, 'https://'))
                        <img loading='lazy' height="300" src="{{ $photography->image }}" class="card-img-top"
                            alt="{{ $photography->name }}">
                    @else
                        <img loading='lazy' height="300" src="{{ asset('storage/' . $photography->image) }}"
                            class="card-img-top" alt="{{ $photography->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $photography->name }}</h5>
                        <p class="card-text">{{ $photography->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
