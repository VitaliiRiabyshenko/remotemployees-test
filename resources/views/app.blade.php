<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>@yield('title') | {{ config('app.name') }}</title>
</head>

<body>
    @if ($message = Session::get('success'))
        @include('includes.succes-toast', ['message' => $message])
    @endif
    <div class="container">
        @include('common.header')
        @yield('main')
    </div>
</body>


<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>

<script>
    $(document).ready(function() {
        $('.toast').toast('show');
    })

    // удаление данных с таблиц
    $(document).ready(function() {
        // For A Delete Record Popup
        $('.remove-record').click(function() {
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            $(".remove-record-model").attr("action", url);
            $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="' +
                id + '">');
            console.log('sdfs');
        });

        $('.remove-data-from-delete-form').click(function() {
            $('body').find('.remove-record-model').find("input").remove();
        });
    });
</script>

</html>
