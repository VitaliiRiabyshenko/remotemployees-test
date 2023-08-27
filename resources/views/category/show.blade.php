@extends('app')

@section('title', "Category $category->title")


@section('main')
    <div class="d-flex flex-column mt-5">
        <div class="d-flex gap-2">
            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success">Update</a>
            <a data-url="{{ route('category.destroy', $category) }}" data-id="{{ $category->id }}"
                class="btn btn-danger remove-record" data-bs-target="#delete-modal" data-bs-toggle="modal">Delete</a>
        </div>
        <h2>Id</h2>
        <p>{{ $category->id }}</p>
        <h2>Title</h2>
        <p>{{ $category->title }}</p>
        <h2>Created_at</h2>
        <p>{{ $category->created_at }}</p>
        <h2>Updated_at</h2>
        <p>{{ $category->updated_at }}</p>
    </div>
@endsection