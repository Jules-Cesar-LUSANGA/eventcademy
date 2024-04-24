@props([
    'name',
    'text',
    'type' => null,
    'nullable' => null,
    'value' => null,
])

<div>
    <label for="{{ $name }}">{{ $text }}</label>

    <textarea name="{{ $name }}" id="{{ $name }}" cols="30" rows="10" @required($nullable == null)>{{ old($name) ? old($name) : $value }}</textarea>

    @error($name)
        <p style="color:red;">
            {{ $message }}
        </p>
    @enderror
</div>