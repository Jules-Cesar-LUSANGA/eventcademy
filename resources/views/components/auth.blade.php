<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>EventCademy-Web</h1>

        <x-form action="{{ route('logout') }}" method="delete">
            <button type="submit">Logout</button>
        </x-form>

        <hr>
    </header>
    <main>
        {{ $slot }}
    </main>
</body>
</html>