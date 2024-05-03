@props([
    'type' => 'submit',
])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'bg-teal-700 hover:bg-teal-600 border-2 border-gray-300 text-white rounded-md p-2 font-bold']) }}>
    {{ $slot }}
</button>