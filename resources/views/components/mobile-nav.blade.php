<div class="responsive-navbar offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvas">
    <div class="offcanvas-header row">
        <a href="{{ route('home') }}" class="logo col-8 d-flex align-items-center" wire:navigate>
            <picture>
                <source srcset="{{ asset('build/images/meow/meow.webp') }}" type="image/webp">
                <img src="{{ asset('build/images/meow/meow.png') }}" alt="logo chat assis" width="100px">
            </picture>
            <span class="meow-logo">Association <br> Meow and Co</span>
        </a>
        <button type="button" class="col-4 close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
            @svg('heroicon-m-x-mark', 'w-75')
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="accordion" id="navbarAccordion">
            <div class="accordion-item">
                <a class="accordion-button without-icon" href="{{ route('home') }}" wire:navigate>
                    Accueil
                </a>
            </div>
            <div class="accordion-item">
                <a class="accordion-button without-icon" href="{{ route('liste-chats') }}" wire:navigate>
                    Les chats et chatons à adopter
                </a>
            </div>
            <div class="accordion-item">
                <a class="accordion-button without-icon" href="{{ route('adopter') }}" wire:navigate>
                    Comment adopter ?
                </a>
            </div>
            <div class="accordion-item">
                <a class="accordion-button without-icon" href="{{ route('contact') }}" wire:navigate>
                    Nous contacter
                </a>
            </div>
        </div>
    </div>
</div>
