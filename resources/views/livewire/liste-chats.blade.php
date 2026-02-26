<main id="main-content">
    {{-- Inner Hero --}}
    <div class="bg-peach pt-[170px] pb-[170px] max-lg:pt-[60px] max-lg:pb-[70px] relative">
        <div class="container-bs">
            <div class="text-center">
                <h1 class="text-[48px] mb-2.5 max-lg:text-[30px] max-lg:mb-0">Les chats et chatons à adopter</h1>
            </div>
        </div>
    </div>

    {{-- Filters + Grid --}}
    <div class="pt-[100px] pb-[75px] max-lg:pt-[60px] max-lg:pb-[35px]">
        <div class="container-bs">
            <div class="flex lg:flex-nowrap flex-wrap justify-center mb-[30px]" role="group" aria-label="Filtrer par catégorie">
                <button @class([
                    'filter-tab-btn w-[150px] h-[80px] max-sm:w-[100px] max-md:w-[115px] mr-10 max-lg:mr-[25px] max-lg:mb-5 font-nunito font-bold text-xl max-md:text-base text-navy text-center cursor-pointer transition-all duration-500',
                    'active' => $filtre === 'tous',
                ]) type="button" wire:click="filtrer(`tous`)" aria-pressed="{{ $filtre === 'tous' ? 'true' : 'false' }}">A adopter</button>

                <button @class([
                    'filter-tab-btn w-[150px] h-[80px] max-sm:w-[100px] max-md:w-[115px] mr-10 max-lg:mr-[25px] max-lg:mb-5 font-nunito font-bold text-xl max-md:text-base text-navy text-center cursor-pointer transition-all duration-500',
                    'active' => $filtre === 'Adulte',
                ]) type="button" wire:click="filtrer(`Adulte`)" aria-pressed="{{ $filtre === 'Adulte' ? 'true' : 'false' }}">Adultes</button>

                <button @class([
                    'filter-tab-btn w-[150px] h-[80px] max-sm:w-[100px] max-md:w-[115px] mr-10 max-lg:mr-[25px] max-lg:mb-5 font-nunito font-bold text-xl max-md:text-base text-navy text-center cursor-pointer transition-all duration-500',
                    'active' => $filtre === 'Chaton',
                ]) type="button" wire:click="filtrer(`Chaton`)" aria-pressed="{{ $filtre === 'Chaton' ? 'true' : 'false' }}">Chatons</button>

                <button @class([
                    'filter-tab-btn w-[150px] h-[80px] max-sm:w-[100px] max-md:w-[115px] mr-10 max-lg:mr-[25px] max-lg:mb-5 font-nunito font-bold text-xl max-md:text-base text-navy text-center cursor-pointer transition-all duration-500',
                    'active' => $filtre === 'Senior',
                ]) type="button" wire:click="filtrer(`Senior`)" aria-pressed="{{ $filtre === 'Senior' ? 'true' : 'false' }}">Senior</button>

                <button @class([
                    'filter-tab-btn w-[150px] h-[80px] max-sm:w-[100px] max-md:w-[115px] mr-10 max-lg:mr-[25px] max-lg:mb-5 font-nunito font-bold text-xl max-md:text-base text-navy text-center cursor-pointer transition-all duration-500',
                    'active' => $filtre === 'Adopté',
                ]) type="button" wire:click="filtrer(`Adopté`)" aria-pressed="{{ $filtre === 'Adopté' ? 'true' : 'false' }}">Les adoptés</button>

                <button @class([
                    'filter-tab-btn w-[150px] h-[80px] max-sm:w-[100px] max-md:w-[115px] mr-10 max-lg:mr-[25px] max-lg:mb-5 font-nunito font-bold text-xl max-md:text-base text-navy text-center cursor-pointer transition-all duration-500',
                    'active' => $filtre === 'Etoile',
                ]) type="button" wire:click="filtrer(`Etoile`)" aria-pressed="{{ $filtre === 'Etoile' ? 'true' : 'false' }}">Les étoiles</button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($chats as $chat)
                    <div wire:key="{{ $chat->id }}">
                        <div class="gallery-widget mb-6">
                            <img src="{{ $chat->getFirstMedia('cv')?->getUrl('card') ?? asset('build/images/abouts/style3-about3.png') }}" class="gallery2" alt="Photo de {{ $chat->nom }}" width="600" height="600" @if($loop->first) fetchpriority="high" @else loading="lazy" @endif>
                            <a href="{{ route('voir-chat', $chat->slug) }}" class="gallery-icon" data-pan="{{ $chat->slug }}" aria-label="Voir le profil de {{ $chat->nom }}">
                                <img src="{{ asset('build/images/svgs/button-white.svg') }}" alt="" aria-hidden="true">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
