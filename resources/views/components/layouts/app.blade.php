<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Links Of CSS File -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Title -->
    <title>{{ ($title ?? '') . ' | ' }}Association Meow and Co</title>
    {{--<link rel="icon" type="image/svg" href="assets/images/favicon.svg">--}}
</head>
<body>

    <x-navigation></x-navigation>
    <x-mobile-nav></x-mobile-nav>

    {{ $slot }}

    <x-footer></x-footer>

    <!-- Scroll Top Btn -->
    <div class="top-button-icon">
        <button id="scrollTopBtn">
            <i class="ri-arrow-up-circle-fill"></i>
        </button>
    </div>
    <!-- Scroll Top Btn -->


    <span id="mouse-follower"></span>
    <span id="dot"></span>

    <script src="{{ asset('build/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('build/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('build/js/scrollCue.min.js') }}"></script>
    <script src="{{ asset('build/js/custom.js') }}"></script>
</body>
</html>
