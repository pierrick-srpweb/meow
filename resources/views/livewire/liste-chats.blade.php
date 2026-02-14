<main>
    {{-- Inner Hero --}}
    <div class="bg-peach pt-[170px] pb-[170px] max-lg:pt-[60px] max-lg:pb-[70px] relative">
        <div class="max-w-[1140px] mx-auto px-4">
            <div class="text-center">
                <h1 class="text-[48px] mb-2.5 max-lg:text-[30px] max-lg:mb-0">Les chats et chatons à adopter</h1>
            </div>
        </div>
    </div>

    {{-- Filters + Grid --}}
    <div class="pt-[100px] pb-[75px] max-lg:pt-[60px] max-lg:pb-[35px]">
        <div class="max-w-[1140px] mx-auto px-4">
            <div class="flex flex-wrap gap-3 mb-8 justify-center">
                <button @class([
                    'px-5 py-2 rounded-full font-nunito font-black text-base transition-all duration-500 cursor-pointer border',
                    'bg-primary text-white border-primary' => $filtre === 'tous',
                    'bg-white text-navy border-gray-200 hover:bg-primary hover:text-white hover:border-primary' => $filtre !== 'tous',
                ]) type="button" wire:click="filtrer(`tous`)">A adopter</button>

                <button @class([
                    'px-5 py-2 rounded-full font-nunito font-black text-base transition-all duration-500 cursor-pointer border',
                    'bg-primary text-white border-primary' => $filtre === 'Adulte',
                    'bg-white text-navy border-gray-200 hover:bg-primary hover:text-white hover:border-primary' => $filtre !== 'Adulte',
                ]) type="button" wire:click="filtrer(`Adulte`)">Adultes</button>

                <button @class([
                    'px-5 py-2 rounded-full font-nunito font-black text-base transition-all duration-500 cursor-pointer border',
                    'bg-primary text-white border-primary' => $filtre === 'Chaton',
                    'bg-white text-navy border-gray-200 hover:bg-primary hover:text-white hover:border-primary' => $filtre !== 'Chaton',
                ]) type="button" wire:click="filtrer(`Chaton`)">Chatons</button>

                <button @class([
                    'px-5 py-2 rounded-full font-nunito font-black text-base transition-all duration-500 cursor-pointer border',
                    'bg-primary text-white border-primary' => $filtre === 'Senior',
                    'bg-white text-navy border-gray-200 hover:bg-primary hover:text-white hover:border-primary' => $filtre !== 'Senior',
                ]) type="button" wire:click="filtrer(`Senior`)">Senior</button>

                <button @class([
                    'px-5 py-2 rounded-full font-nunito font-black text-base transition-all duration-500 cursor-pointer border',
                    'bg-primary text-white border-primary' => $filtre === 'Adopté',
                    'bg-white text-navy border-gray-200 hover:bg-primary hover:text-white hover:border-primary' => $filtre !== 'Adopté',
                ]) type="button" wire:click="filtrer(`Adopté`)">Les adoptés</button>

                <button @class([
                    'px-5 py-2 rounded-full font-nunito font-black text-base transition-all duration-500 cursor-pointer border',
                    'bg-primary text-white border-primary' => $filtre === 'Etoile',
                    'bg-white text-navy border-gray-200 hover:bg-primary hover:text-white hover:border-primary' => $filtre !== 'Etoile',
                ]) type="button" wire:click="filtrer(`Etoile`)">Les étoiles</button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($chats as $chat)
                    <div wire:key="{{ $chat->id }}">
                        <div class="gallery-widget mb-6">
                            <img src="{{ $chat->getFirstMedia('cv')->getUrl('preview') ?? asset('build/images/abouts/style3-about3.png') }}" class="gallery2" alt="image" @if(!$loop->first) loading="lazy" @endif>
                            <a href="{{ route('voir-chat', $chat->slug) }}" class="gallery-icon" data-pan="{{ $chat->slug }}">
                                <img src="{{ asset('build/images/svgs/button-white.svg') }}" alt="image">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
