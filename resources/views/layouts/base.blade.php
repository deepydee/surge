<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2&display=swap" rel="stylesheet">
    <!-- AlpineJS -->
    @vite('resources/css/app.css')
    @livewireStyles
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    @stack('styles')
</head>
<body class="antialiased font-sans bg-gray-100">

    @yield('content')

    @livewireScripts
    @stack('scripts')
</body>
</html>