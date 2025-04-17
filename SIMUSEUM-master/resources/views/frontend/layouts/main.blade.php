<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link style="width: 50px;" rel='shortcut icon' type='image/x-icon'
        href="{{ asset('frontend') }}/images/logo-title.png" />
    <title>
        Museum Rumah Kelahiran BAC
    </title>
    {{-- <link rel="shortcut icon" href="favicon.png" /> --}}

    {{-- <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" /> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('frontend') }}/fonts/icomoon/style.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/tiny-slider.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/aos.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css" />


</head>


<body>
    <div class="wrapper">

        <div class="content-wrapper">
            @yield('container')
        </div>



        <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('frontend') }}/js/tiny-slider.js"></script>
        <script src="{{ asset('frontend') }}/js/aos.js"></script>
        <script src="{{ asset('frontend') }}/js/navbar.js"></script>
        <script src="{{ asset('frontend') }}/js/counter.js"></script>
        <script src="{{ asset('frontend') }}/js/custom.js"></script>
        <script src="{{ asset('frontend') }}/plugins/chart.js/Chart.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
