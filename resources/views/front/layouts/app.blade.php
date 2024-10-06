<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    @stack('metaSeO')
    <meta name="robots" content="index, follow">
    <title>{{ $page_title ?? 'Blog' }} - {{ config('app.name', 'BlogSystem') }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/front/img/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/front/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/front/css/custom.css') }}" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div class="min-vh-100 d-flex flex-column justify-content-between">
        @include('front.layouts.navigation')

        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">{{ $config['title'] }}!</h1>
                    <p class="lead mb-0">{{ $config['caption'] }}</p>
                </div>
            </div>
        </header>

        @yield('content')

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; {{ $config['footer'] }} {{ date('Y') }}</p>
            </div>
        </footer>

    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('assets/front/js/scripts.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

    @yield('js')
</body>

</html>
