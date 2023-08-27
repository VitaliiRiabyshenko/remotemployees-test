@extends('app')

@section('title', 'Lots')


@section('main')
    <div class="row">
        @include('includes.filter')
        <div class="col-10 container-fluid">
            <div class="align-items-start m-3">
                <a href="{{ route('lot.create') }}" class="btn btn-info">
                    Add Lot</a>
            </div>
            @if (!$lots->isEmpty())
                @foreach ($lots as $lot)
                    <div class="d-flex flex-column gap-3 border border-primary rounded-2 m-3">
                        <a href="{{ route('lot.show', $lot->id) }}" class="link-dark link-underline link-underline-opacity-0">
                            <div class="d-flex flex-column mx-3">
                                <h3>{{ $lot->name }}</h3>
                                <p>{{ $lot->description }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div>{{ $lots->withQueryString()->links() }}</div>
            @else
                <h2 class="mt-5 text-center">There are no lots</h2>
            @endif
        </div>
    </div>
@endsection


@section('js')
    <script>
        // unchek checkbox without id "Other"
        function unCheck(obj) {
            var id = obj.id;
            var get = document.getElementsByName("categories[]");

            for (var i = 0; i < get.length; i++) {
                if (get[i].id !== id) {
                    get[i].checked = false;
                }
            }
        }

        // unchek checkbox with id "Other"
        function unCheckOther() {
            var get = document.getElementsByName("categories[]");
            for (var i = 0; i < get.length; i++) {
                if (get[i].id === 'Other') {
                    get[i].checked = false;
                }
            }
        }

        // clicking a submit Filter Form
        function submitClick() {
            document.getElementById('filterForm').submit();
        }
    </script>
@endsection