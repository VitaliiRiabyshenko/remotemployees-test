@extends('app')

@section('title', 'Add Lot')


@section('main')
    <div class="d-flex justify-content-center mt-5">
        <form action="{{ route('lot.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value='{{ old('name') }}'>
            </div>
            @include('includes.show-error', ['name' => 'title'])
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input name="description" type="text" class="form-control @error('description') is-invalid @enderror" id="description" value='{{ old('description') }}'>
            </div>
            @include('includes.show-error', ['name' => 'description'])
            <div class="mb-3">
                <label for="category" class="form-label">Categories</label>
                <select class="form-select" name="categories[]" size="3" multiple>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ (collect(old('categories'))->contains($category->id)) ? 'selected':'' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            @include('includes.show-error', ['name' => 'categories'])
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection