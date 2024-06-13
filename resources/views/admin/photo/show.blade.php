@extends('layouts.admin')
@section('content')
    <div class="jumbotron bg-dark text-white p-5 d-flex align-items-center justify-content-between">
        <h1>Photographys {{ $photography->name }}</h1>
        <a class="btn btn-primary" href="{{ route('admin.photographys.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="container p-3">

        <h2 class="text-center">{{ $photography->name }}</h2>
        <div class="container d-flex gap-4">
            @if (Str::startsWith($photography->image, 'https://'))
                <img height="500" width="400" loading='lazy' src="{{ $photography->image }}" alt="">
            @else
                <img height="500" width="400" loading='lazy' src="{{ asset('storage/' . $photography->image) }}"
                    alt="">
            @endif
            <ul class="list-unstyled">
                <li><strong>Description:</strong> {{ $photography->description }}</li>
                <hr>
                <li><strong>Category:</strong> {{ $photography->category ? $photography->category->name : 'Uncategorize' }}
                </li>
                <li><strong>Upload:</strong> {{ $photography->upload_image }}</li>

                <li><strong>City:</strong> {{ $photography->city }}</li>

                <li><strong>In evidence:</strong> {{ $photography->evidence == 0 ? 'Sì' : 'No' }}</li>
            </ul>
        </div>
    </div>
@endsection
