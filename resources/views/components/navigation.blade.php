<nav class="navbar-main relative z-[4] py-3.5 max-lg:py-2.5" id="navbar">
    <div class="max-w-[1560px] mx-auto px-4 flex items-center justify-between">
        <a class="flex items-center" href="{{ route('home') }}" wire:navigate>
            <picture>
                <source srcset="{{ asset('build/images/meow/meow.webp') }}" type="image/webp">
                <img src="{{ asset('build/images/meow/meow.png') }}" class="w-[100px]" alt="logo chat assis" width="100">
            </picture>
            <span class="meow-logo">Association <br> Meow and Co</span>
        </a>

        {{-- Burger menu (mobile) --}}
        <button class="lg:hidden border-none p-0 cursor-pointer" @click="$dispatch('toggle-mobile-menu')">
            <span class="flex flex-col gap-[5px]">
                <span class="block h-[3px] w-[30px] bg-burger"></span>
                <span class="block h-[3px] w-[30px] bg-burger"></span>
                <span class="block h-[3px] w-[30px] bg-burger"></span>
            </span>
        </button>

        {{-- Desktop nav --}}
        <div class="hidden lg:flex items-center gap-6">
            <ul class="flex items-center gap-0 list-none m-0 p-0">
                <li class="mx-6 first:ml-0 last:mr-0">
                    <a href="{{ route('home') }}"
                       class="font-nunito font-bold text-navy py-6 transition-all duration-500 hover:text-primary {{ request()->routeIs('home') ? 'text-primary' : '' }}"
                       wire:navigate data-pan="homepage">
                        Accueil
                    </a>
                </li>
                <li class="mx-6">
                    <a href="{{ route('liste-chats') }}"
                       class="font-nunito font-bold text-navy py-6 transition-all duration-500 hover:text-primary {{ request()->routeIs('liste-chats') ? 'text-primary' : '' }}"
                       wire:navigate data-pan="liste-chats">
                        Chats et chatons à adopter
                    </a>
                </li>
                <li class="mx-6">
                    <a href="{{ route('adopter') }}"
                       class="font-nunito font-bold text-navy py-6 transition-all duration-500 hover:text-primary {{ request()->routeIs('adopter') ? 'text-primary' : '' }}"
                       wire:navigate data-pan="adopter">
                        Comment adopter ?
                    </a>
                </li>
                <li class="mx-6 last:mr-0">
                    <a href="{{ route('contact') }}"
                       class="font-nunito font-bold text-navy py-6 transition-all duration-500 hover:text-primary {{ request()->routeIs('contact') ? 'text-primary' : '' }}"
                       wire:navigate data-pan="contact">
                        Nous contacter
                    </a>
                </li>
            </ul>

            <a href="{{ route('adopter') }}" class="btn-orange-animated relative bottom-[-4px]" wire:navigate data-pan="adopter">
                <span>Adopter un chat</span>
                <img src="{{ asset('build/images/svgs/button-white.svg') }}" alt="bouton flèche droite">
            </a>
        </div>
    </div>
</nav>
