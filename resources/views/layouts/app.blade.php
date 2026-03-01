<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Backlit frame')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cormorant+Unicase:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="shortcut icon" type="image/webp" href="{{ asset('images/logo.webp') }}" />
    @vite(['resources/sass/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</body>

</html>