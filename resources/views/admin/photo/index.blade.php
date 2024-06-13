@extends('layouts.admin')
@section('content')
    <header class="mb-3">
        <div class="jumbotron bg-dark text-white p-4 d-flex align-items-center justify-content-between">
            <h1>Photographys</h1>
            <a class="btn btn-primary" href="{{ route('admin.photographys.create') }}">
                <i class="fa-solid fa-plus"></i> Create
            </a>
        </div>



    </header>
    <div class="container">
        @include('partials.session-message')
        <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-dark align-middle">
                <thead class="table-light">
                    <caption>
                        Photographys
                    </caption>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Upload</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($photographys as $photo)
                        <tr class="table-primary">
                            <td scope="row">{{ $photo->id }}</td>
                            <td>{{ $photo->name }}</td>
                            <td>
                                @if (Str::startsWith($photo->image, 'https://'))
                                    <img width="160" loading='lazy' src="{{ $photo->image }}" alt="">
                                @else
                                    <img width="160" height="130" loading='lazy'
                                        src="{{ asset('storage/' . $photo->image) }}" alt="">
                                @endif
                            </td>

                            <td>{{ $photo->upload_image }}</td>
                            <td>

                                <a href="{{ route('admin.photographys.show', $photo) }}"
                                    class="text-white a-un btn btn-primary"><i class="fa-solid fa-eye"></i></a>


                                <a href="{{ route('admin.photographys.edit', $photo) }}"
                                    class="text-white a-un btn btn-dark"><i class="fa-solid fa-pencil-alt"></i></a>

                                @include('partials.delete-modal')
                            </td>
                        </tr>
                    @empty
                        <tr class="table-primary">
                            <td scope="row">No photo</td>
                        </tr>
                    @endforelse










                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>
@endsection
