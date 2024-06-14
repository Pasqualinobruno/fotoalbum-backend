@extends('layouts.admin')
@section('content')
    <header class="mb-3">
        <div class="jumbotron bg-dark text-white p-4 d-flex align-items-center justify-content-between">
            <h1>Photographys</h1>
            <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">
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
                        Categories
                    </caption>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>



                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($categories as $category)
                        <tr class="table-primary">
                            <td scope="row">{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                    class="text-white a-un btn btn-dark"><i class="fa-solid fa-pencil-alt"></i></a>
                                @include('partials.delete-modal-category')
                            </td>

                        </tr>
                    @empty
                        <tr class="table-primary">
                            <td scope="row">No category</td>
                        </tr>
                    @endforelse

                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>
@endsection
<style>
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>
