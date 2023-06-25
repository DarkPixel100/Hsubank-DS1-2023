<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/general.css') }}" />
    <title>@yield('title') - Hsubank</title>
</head>
<body>
    @include ('layouts.includes.header')
    <main>
        @yield('main')
    </main>
    @include ('layouts.includes.footer')
</body>
</html>
