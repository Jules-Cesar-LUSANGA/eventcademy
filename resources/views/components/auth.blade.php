<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        <h1>EventCademy</h1>

        <nav>
            <a href="{{ route('events.index') }}">Evènements</a>
            <a href="{{ route("my-events") }}">Vos evènements</a>
            <a href="{{ route("events.create") }}">Publier un evènement</a>
            <a href="{{ route("reservations.agenda") }}">Agenda</a>
            <a href="{{ route('profile.edit') }}">Votre profil</a>
        </nav>
        <x-form action="{{ route('logout') }}" method="delete">
            <button type="submit">Logout</button>
        </x-form>

        <hr>
    </header>
    <main>

        @session('error')
            <p style="color: red;">{{ session('error') }}</p>
        @endsession

        @session('success')
            <p style="color: blue;">{{ session('success') }}</p>
        @endsession

        {{ $slot }}
    </main>
</body>
</html>