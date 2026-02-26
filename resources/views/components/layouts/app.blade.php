<!doctype html>
<html lang="fr" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="L'association Meow and Co recueille, soigne et fait adopter des chats trouvés ou abandonnés pour leur offrir une seconde chance. Nous agissons dans les départements de Vendée (85), Charentes-Maritime (17) et Deux-Sèvres (79).">
    <meta name="keywords" content="chats, chatons, association, refuge">
    <meta name="author" content="Association Meow and Co">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;700;800;900&family=Mulish:wght@400;500;600;700;900&display=swap" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Pacifico&text=AssociationMeowandCo&display=swap" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;700;800;900&family=Mulish:wght@400;500;600;700;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&text=AssociationMeowandCo&display=swap" rel="stylesheet">
    </noscript>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preload" as="image" href="{{ asset('build/images/meow/hero-meow.png') }}">

    <title>{{ $title ?? 'Accueil' }} | Association Meow and Co</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body class="font-mulish text-base font-normal text-body min-h-dvh">

    <x-navigation></x-navigation>
    <x-mobile-nav></x-mobile-nav>

    {{ $slot }}

    <x-footer></x-footer>

    <button x-data="{ visible: false }"
            @scroll.window="visible = window.scrollY > 20"
            x-show="visible"
            x-transition.opacity
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            id="scrollTopBtn">
    </button>
</body>
</html>
