<main>
    <!-- Inner Hero Warp Start -->
    <div class="inner-hero-warp">
        <div class="container">
            <div class="inner-hero-content">
                <h1>Les chats et chatons à adopter</h1>
            </div>
        </div>
    </div>
    <!-- Inner Hero Warp End -->

    <!-- Childhood Warp Start -->
    <div class="passion-warp pt-100 pb-75">
        <div class="container">
            <div class="childhood-tab passion-tab">
                <ul class="nav nav-pills mb-3" id="pills-tab1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button @class(['nav-link', 'active' => $filtre === 'tous'])  type="button" wire:click="filtrer(`tous`)">A adopter</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button @class(['nav-link', 'active' => $filtre === 'Adulte']) type="button" wire:click="filtrer(`Adulte`)">Adultes</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button @class(['nav-link', 'active' => $filtre === 'Chaton']) type="button" wire:click="filtrer(`Chaton`)">Chatons</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button @class(['nav-link', 'active' => $filtre === 'Senior']) type="button" wire:click="filtrer(`Senior`)">Senior</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button @class(['nav-link', 'active' => $filtre === 'Adopté']) type="button" wire:click="filtrer(`Adopté`)">Les adoptés</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button @class(['nav-link', 'active' => $filtre === 'Etoile']) type="button" wire:click="filtrer(`Etoile`)">Les étoiles</button>
                    </li>
                </ul>



                <div class="row justify-content-center" id="container2">
                    @foreach($chats as $chat)
                        <div class="col-lg-3 item2 col-sm-6" wire:key="{{ $chat->id }}">
                            <div class="gallery-widget">
                                <img src="{{ $chat->getMedia('cv')->first()?->getUrl() ?? asset('build/images/abouts/style3-about3.png') }}" class="gallery2" alt="image">
                                <a href="{{ route('voir-chat', $chat->slug) }}" class="gallery-icon" data-pan="{{ $chat->slug }}">
                                    <img src="{{ asset('build/images/svgs/button-white.svg') }}" alt="image">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Childhood Warp End -->
</main>
