@extends('app')

@section('title', 'Add Category')


@section('main')
    <div class="d-flex justify-content-center mt-5">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" value='{{ old('title') }}'>
            </div>
            @include('includes.show-error', ['name' => 'title'])
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection