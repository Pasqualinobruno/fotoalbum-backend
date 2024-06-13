@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            @foreach ($photographys as $photo)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        @if (Str::startsWith($photo->image, 'https://'))
                            <img class="card-img-top" loading='lazy' src="{{ $photo->image }}" alt="">
                        @else
                            <img class="card-img-top" loading='lazy' src="{{ asset('storage/' . $photo->image) }}"
                                alt="">
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">
                                <a class="text-decoration-none text-dark"
                                    href="{{ route('admin.photographys.show', $photo) }}">{{ $photo->name }}</a>
                            </h2>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <style>
        .card {
            width: 18rem;

            .card-img-top {
                object-fit: cover;
                width: 100%;
                height: 200px;
            }

        }
    </style>
@endsection
