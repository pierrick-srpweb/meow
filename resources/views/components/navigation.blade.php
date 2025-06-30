<nav class="navbar navbar-expand-lg top-navbar" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}" wire:navigate>
            <img src="{{ asset('build/images/meow/meow.png') }}" class="navbar-logo" alt="logo" width="100px">
            <span class="meow-logo">Association <br> Meow and Co</span>
        </a>
        <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" aria-controls="navbarOffcanvas">
            <span class="burger-menu">
                <span class="top-bar"></span>
                <span class="middle-bar"></span>
                <span class="bottom-bar"></span>
            </span>
        </a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" wire:navigate>
                        Accueil
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('liste-chats') }}" class="nav-link {{ request()->routeIs('liste-chats') ? 'active' : '' }}" wire:navigate>
                        Chats et chatons à adopter
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('adopter') }}" class="nav-link {{ request()->routeIs('adopter') ? 'active' : '' }}" wire:navigate>
                        Comment adopter ?
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" wire:navigate> Nous contacter</a>
                </li>
            </ul>

            <div class="others-option d-flex align-items-center">

                <div class="option-item">
                    <a href="{{ route('adopter') }}" class="default-btn style2" wire:navigate>
                        <span>Adopter un chat</span>
                        <img src="{{ asset('build/images/svgs/button-white.svg') }}" alt="image">
                    </a>
                </div>

                {{--<div class="option-item">
                    <button class="btn side-bar-btn style2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                        <img src="{{ asset('build/images/svgs/dotsmenu1.svg') }}" alt="">
                    </button>
                </div>--}}

            </div>
        </div>

    </div>
</nav>
