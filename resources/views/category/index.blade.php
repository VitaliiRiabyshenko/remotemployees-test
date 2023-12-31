@extends('app')

@section('title', 'Categories')


@section('main')
    <div class="table-wrapper" style="margin-bottom: 0; margin-top:20px; ">
        <div class="table-title">
            <div class="row mb-3">
                <div class="col align-items-end">
                    <a href="{{ route('category.create') }}" class="btn btn-info">
                        Add Category</a>
                </div>
            </div>
        </div>
        @if ($categories)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td><a href="{{ route('category.show', $category->title) }}">{{ $category->title }}</a></td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success">Update</a>
                                <a data-url="{{ route('category.destroy', $category) }}" data-id="{{ $category->id }}"
                                    class="btn btn-danger remove-record" data-bs-target="#delete-modal"
                                    data-bs-toggle="modal">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>{{ $categories->withQueryString()->links() }}</div>
        @else
            <h2 class="mt-5 text-center">There are no categories</h2>
        @endif
    </div>
    @include('includes.delete-modal')
@endsection
