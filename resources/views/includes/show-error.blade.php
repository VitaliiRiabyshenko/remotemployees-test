@if ($errors->has($name))
    <div class="text-danger mb-3">
        {{ $errors->first($name) }}
    </div>
@endif
