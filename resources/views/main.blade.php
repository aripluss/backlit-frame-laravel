<!doctype html>
<html lang="ua">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Backlit frame</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cormorant+Unicase:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="shortcut icon" type="image/webp" href="{{ asset('images/logo.webp') }}" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    @include('partials.header')

    <main id="main">
        @include('main-page.hero')
        @include('main-page.popular-designs', ['items' => $popularDesigns])
        @include('main-page.how-it-works')
        @include('main-page.why-we')
        @include('main-page.steps-to-order')
        @include('main-page.feedback')
        @include('main-page.faq')
        @include('main-page.contact_form')
    </main>

    @include('partials.footer')

    @include("main-page.mobile-menu")
</body>

</html>