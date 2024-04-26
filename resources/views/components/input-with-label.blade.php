@props([
    'name',
    'text',
    'type' => null,
    'nullable' => null,
    'value' => null,
    'placeholder' => null,
])

<div>
    <label for="{{ $name }}">{{ $text }}</label>
    <input type="{{ $type == null ? 'text' : $type }}" name="{{ $name }}" id="{{ $name }}" @required($nullable == null) value="{{ old($name) ? old($name) : $value }}" placeholder="{{ $placeholder }}">

    @error($name)
        <p style="color:red;">
            {{ $message }}
        </p>
    @enderror
</div>