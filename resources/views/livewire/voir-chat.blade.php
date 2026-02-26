<main>
    {{-- Inner Hero --}}
    <div class="bg-peach pt-[170px] pb-[170px] max-lg:pt-[60px] max-lg:pb-[70px] relative">
        <div class="container-bs">
            <div class="text-center">
                <h1 class="text-[48px] mb-2.5 max-lg:text-[30px] max-lg:mb-0">{{ Str::upper($chat->nom) }}</h1>
            </div>
        </div>
    </div>

    <div class="pt-5 pb-[100px] max-lg:pb-[60px]">
        <div class="container-bs">
            @if($chat->getMedia('cv')->isNotEmpty())
                <div class="text-center mb-10">
                    <img class="rounded-[30px] max-w-full mx-auto" src="{{ $chat->getFirstMediaUrl('cv', 'detail') }}" alt="Photo de {{ $chat->nom }}" width="900" height="900" fetchpriority="high">
                </div>
            @endif

            @if(!in_array($chat->categorie, ['Adopté', 'Etoile'], true))
                <div class="text-center pb-10">
                    <a href="{{ route('adopter') }}" class="btn-orange-animated">
                        <span>Je l'adopte !</span>
                        <img src="{{ asset('build/images/svgs/button-white.svg') }}" alt="image">
                    </a>
                </div>
            @endif

            <div class="pl-4">
                <div class="bg-cream border border-gray-200 rounded-[30px] p-[35px_40px] mb-10">
                    <h3 class="text-[22px] mb-4">Son CV</h3>
                    @if($chat->description)
                        <p>{!! Str::sanitizeHtml($chat->description) !!}</p>
                    @endif
                    <ul class="list-none p-0 m-0">
                        <li class="relative font-semibold text-heading pb-5 mb-5 border-b border-dashed border-navy/20">
                            Date de naissance :
                            <span class="block text-primary">{{ isset($chat->sexe) ? \Carbon\Carbon::parse($chat->date_naissance)->locale('fr_FR')->isoFormat('DD MMMM YYYY') : 'inconnue' }}</span>
                        </li>
                        <li class="relative font-semibold text-heading pb-0 mb-0">
                            Sexe :
                            <span class="block text-primary">{{ isset($chat->sexe) ? Str::ucwords($chat->sexe) : 'Non renseigné' }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            @if($chat->getMedia('photos')->isNotEmpty())
                <div class="mt-10" id="gallery-chat">
                    <div class="text-center mb-6">
                        <h3 class="text-[22px] mb-2">Galerie photos</h3>
                        <span>Cliquez sur la photo pour l'agrandir</span>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 justify-center">
                        @foreach($chat->getMedia('photos')->sortBy('order_column') as $photo)
                            @php
                                $width = $photo->getCustomProperty('width', 1200);
                                $height = $photo->getCustomProperty('height', 800);
                            @endphp
                            <div>
                                <a href="{{ $photo->getUrl() }}"
                                   data-pswp-width="{{ $width }}"
                                   data-pswp-height="{{ $height }}"
                                   target="_blank">
                                    <img
                                        src="{{ $photo->getUrl('thumbnail') }}"
                                        alt="Photo de {{ $chat->nom }}"
                                        loading="lazy"
                                        width="560"
                                        height="400"
                                        class="w-full h-[200px] object-cover rounded-lg shadow-sm cursor-pointer">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</main>
