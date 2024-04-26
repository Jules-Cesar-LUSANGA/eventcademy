<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <main>

        <h2>{{ config('app.name') }}</h2>

        @session('error')
            <div style="color: red;">
                {{ session('error') }}
            </div>
        @endsession
        
        {{ $slot }}
    </main>
</body>
</html>