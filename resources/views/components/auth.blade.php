<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <x-navbar></x-navbar>
    </header>
    
    <main class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-2">

        <x-alert-error></x-alert-error>
        <x-alert-success></x-alert-success>

        {{ $slot }}
    </main>
</body>
</html>