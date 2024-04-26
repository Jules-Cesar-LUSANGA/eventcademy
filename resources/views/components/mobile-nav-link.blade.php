@props(['href'])

{{-- Check if current route is the passed href --}}
@php
    $currentRoute = url()->current();
    $isCurrentRoute = $currentRoute === $href;
@endphp

<a href="{{ $href }}" {{ $attributes->merge([
    'class' => $isCurrentRoute ? 'bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium' : 'text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium'
    ]) }}>
    {{ $slot }}
</a>
