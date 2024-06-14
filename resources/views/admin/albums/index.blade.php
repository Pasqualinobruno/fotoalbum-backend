@extends('layouts.admin')
@section('content')
    <header class="mb-3">
        <div class="jumbotron bg-dark text-white p-4 d-flex align-items-center justify-content-between">
            <h1>Albums</h1>
            <a class="btn btn-primary" href="{{ route('admin.albums.create') }}">
                <i class="fa-solid fa-plus"></i> Create
            </a>
        </div>



    </header>
    <div class="container m-auto">
        @include('partials.session-message')
        <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-dark align-middle">
                <thead class="table-light">
                    <caption>
                        Albums
                    </caption>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Upload date</th>
                        <th>Number photo</th>
                        <th>Action</th>



                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($albums as $album)
                        <tr class="table-primary">
                            <td scope="row">{{ $album->id }}</td>
                            <td>{{ $album->name }}</td>
                            <td>{{ $album->upload_album }}</td>
                            <td>
                                <span class="badge bg-success">{{ $album->photographies->count() }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.albums.show', $album) }}"
                                    class="text-white a-un btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('admin.albums.edit', $album) }}" class="text-white a-un btn btn-dark"><i
                                        class="fa-solid fa-pencil-alt"></i></a>
                                @include('partials.delete-modal-album')
                            </td>

                        </tr>
                    @empty
                        <tr class="table-primary">
                            <td scope="row">No albums</td>
                        </tr>
                    @endforelse

                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>
@endsection
