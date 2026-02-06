<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="L'association Meow and Co recueille, soigne et fait adopter des chats trouvés ou abandonnés pour leur offrir une seconde chance. Nous agissons dans les départements de Vendée (85), Charentes-Maritime (17) et Deux-Sèvres (79).">
    <meta name="keywords" content="chats, chatons, association, refuge">
    <meta name="author" content="Association Meow and Co">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&text=AssociationMeowandCo&display=swap" rel="stylesheet">

    <!-- Links Of CSS File -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Title -->
    <title>{{ ($title ?? '') . ' | ' }}Association Meow and Co</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body>

    <x-navigation></x-navigation>
    <x-mobile-nav></x-mobile-nav>

    {{ $slot }}

    <x-footer></x-footer>

    <!-- Scroll Top Btn -->
    <div class="top-button-icon">
        <button id="scrollTopBtn"></button>
    </div>

    <script src="{{ asset('build/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('build/js/scrollCue.min.js') }}" defer></script>
    <script src="{{ asset('build/js/custom.js') }}" defer></script>
</body>
</html>
