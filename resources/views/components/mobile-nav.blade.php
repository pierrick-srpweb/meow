<div x-data="{ open: false }"
     @toggle-mobile-menu.window="open = !open"
     @keydown.escape.window="open = false"
     class="lg:hidden">

    {{-- Backdrop --}}
    <div x-show="open"
         x-transition:enter="transition-opacity duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-50"
         x-transition:leave="transition-opacity duration-300"
         x-transition:leave-start="opacity-50"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/50 z-40"
         @click="open = false">
    </div>

    {{-- Slide-in panel --}}
    <div x-show="open"
         x-transition:enter="transition-transform duration-300 ease-out"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition-transform duration-300 ease-in"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed top-0 right-0 h-full w-[320px] max-w-[85vw] bg-white z-50 shadow-xl flex flex-col"
         x-cloak>

        {{-- Header --}}
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
            <a href="{{ route('home') }}" class="flex items-center" wire:navigate @click="open = false">
                <picture>
                    <source srcset="{{ asset('build/images/meow/meow.webp') }}" type="image/webp">
                    <img src="{{ asset('build/images/meow/meow.png') }}" alt="logo chat assis" width="60">
                </picture>
                <span class="meow-logo text-base leading-none">Association <br> Meow and Co</span>
            </a>
            <button @click="open = false" class="text-burger hover:text-orange bg-transparent border-none cursor-pointer p-0">
                @svg('heroicon-m-x-mark', 'w-8 h-8')
            </button>
        </div>

        {{-- Links --}}
        <nav class="flex flex-col gap-6 p-6">
            <a href="{{ route('home') }}"
               class="text-navy font-medium text-[15px] transition-colors hover:text-primary"
               wire:navigate @click="open = false">
                Accueil
            </a>
            <a href="{{ route('liste-chats') }}"
               class="text-navy font-medium text-[15px] transition-colors hover:text-primary"
               wire:navigate @click="open = false">
                Les chats et chatons à adopter
            </a>
            <a href="{{ route('adopter') }}"
               class="text-navy font-medium text-[15px] transition-colors hover:text-primary"
               wire:navigate @click="open = false">
                Comment adopter ?
            </a>
            <a href="{{ route('contact') }}"
               class="text-navy font-medium text-[15px] transition-colors hover:text-primary"
               wire:navigate @click="open = false">
                Nous contacter
            </a>
        </nav>
    </div>
</div>
