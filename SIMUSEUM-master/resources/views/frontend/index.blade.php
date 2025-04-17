<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('frontend') }}/fonts/icomoon/style.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/tiny-slider.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/aos.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css" />

    <title>
      Museum Rumah Kelahiran BAC
    </title>
  </head>
  @include('frontend.layouts.navbar')
  @include('frontend.layouts.content')
  @include('frontend.layouts.footer')
  <body>
    <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/js/tiny-slider.js"></script>
    <script src="{{ asset('frontend') }}/js/aos.js"></script>
    <script src="{{ asset('frontend') }}/js/navbar.js"></script>
    <script src="{{ asset('frontend') }}/js/counter.js"></script>
    <script src="{{ asset('frontend') }}/js/custom.js"></script>
  </body>
</html>