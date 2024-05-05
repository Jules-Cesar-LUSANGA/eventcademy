@props([
    'type' => 'submit',
])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'bg-red-700 hover:bg-red-600 border-2 border-gray-300 text-white rounded-md p-2 font-bold']) }}>
    {{ $slot }}
</button>