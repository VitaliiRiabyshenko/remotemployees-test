@extends('app')

@section('title', "Lot $lot->name")


@section('main')
    <div class="d-flex flex-column mt-5">
        <div class="d-flex gap-2">
            <a href="{{ route('lot.edit', $lot->id) }}" class="btn btn-success">Update</a>
            <a data-url="{{ route('lot.destroy', $lot) }}" data-id="{{ $lot->id }}" class="btn btn-danger remove-record"
                data-bs-target="#delete-modal" data-bs-toggle="modal">Delete</a>
        </div>
        <h3>Id</h3>
        <p>{{ $lot->id }}</p>
        <h3>Name</h3>
        <p>{{ $lot->name }}</p>
        <h3>Description</h3>
        <p>{{ $lot->description }}</p>
        @if ($categories->isNotEmpty())
            <h3>Categories</h3>
            @foreach ($categories as $category)
                <p>{{ $category->title }}</p>
            @endforeach
        @endif
        <h3>Created_at</h3>
        <p>{{ $lot->created_at }}</p>
        <h3>Updated_at</h3>
        <p>{{ $lot->updated_at }}</p>
    </div>
    @include('includes.delete-modal')
@endsection
