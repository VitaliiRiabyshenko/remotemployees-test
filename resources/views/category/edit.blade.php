@extends('app')

@section('title', 'Update Category')


@section('main')
    <div class="d-flex justify-content-center mt-5">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" value='{{ old('title', $category->title) }}'>
            </div>
            @include('includes.show-error', ['name' => 'title'])
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection