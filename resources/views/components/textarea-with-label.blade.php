@props([
    'name',
    'text',
    'type' => null,
    'value' => null,
])

<div>
    <label for="{{ $name }}" class="font-bold">{{ $text }}</label>

    <textarea name="{{ $name }}" id="{{ $name }}" cols="30" rows="5"
        {{ $attributes->merge(['class' => 'border-2 border-gray-300 rounds p-2 w-full']) }}
    >{{ old($name) ? old($name) : $value }}</textarea>

    @error($name)
        <p class="text-red-500">
            {{ $message }}
        </p>
    @enderror
</div>