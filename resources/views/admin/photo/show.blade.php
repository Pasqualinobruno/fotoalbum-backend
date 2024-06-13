@extends('layouts.admin')
@section('content')
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
                <li><strong>Upload:</strong> {{ $photography->upload_image }}</li>

                <li><strong>City:</strong> {{ $photography->city }}</li>

                <li><strong>In evidence:</strong> {{ $photography->evidence == 0 ? 'Sì' : 'No' }}</li>
            </ul>
        </div>
    </div>
@endsection
