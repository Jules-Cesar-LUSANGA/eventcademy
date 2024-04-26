@props([
    'action',
    'linkText',
    'linkRoute',
])

<x-guest>
    <x-form action="{{ $action }}">
        
        <div class="flex flex-col items-center justify-center h-screen">
            
            <div class="mb-3">
                <img src="{{ asset('logo.png') }}" alt="">
            </div>

            <div class="shadow-lg p-6 mb-3 bg-white rounded">

                <x-alert-error></x-alert-error>

                {{ $slot }}

            </div>

            <a href="{{ $linkRoute }}" class="text-blue-500">{{ $linkText }}</a>
        </div>

        
    </x-form>
</x-guest>