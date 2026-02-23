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

<body class="product-page">
  @include('partials.header')

  <main id="main">
    @include('product-page.product-header')
    @include('product-page.product-info')
  </main>

  @include('partials.footer')

</body>

</html>