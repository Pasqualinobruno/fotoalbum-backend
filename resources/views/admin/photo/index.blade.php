@extends('layouts.admin')
@section('content')
    <header class="py-3">
        <div class="container">
            <h1>Photographys</h1>
        </div>
    </header>
    <div class="container">
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
                            <td><img width="160" src="{{ $photo->image }}" alt=""></td>
                            <td>{{ $photo->upload_image }}</td>
                            <td>
                                <a href="">Viev</a>/<a href="">Edit</a>/<a href="">Delet</a>
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
