@props([
    'name',
    'text',
    'type' => null,
    'nullable' => null,
    'value' => null,
    'placeholder' => null,
])

<div class="mb-3">
    <label for="{{ $name }}" class=" font-semibold">{{ $text }}</label>

    <input type="{{ $type == null ? 'text' : $type }}" name="{{ $name }}" id="{{ $name }}" @required($nullable == null) value="{{ old($name) ? old($name) : $value }}" placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'border-2 border-gray-300 rounds p-2 w-full']) }}
    >

    @error($name)
        <p class="text-red-500">
            {{ $message }}
        </p>
    @enderror
</div>