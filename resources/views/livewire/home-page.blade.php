<main>
    {{-- Hero --}}
    <div class="bg-cover bg-center bg-no-repeat relative z-[1]" style="background-image: url('{{ asset('build/images/meow/hero-meow.png') }}')">
        <div class="max-w-[1560px] mx-auto px-4 flex flex-col md:flex-row md:justify-between items-center">
            <div class="pt-[220px] pb-[295px] max-w-[810px] max-lg:pt-[70px] max-lg:pb-[30px]">
                <span class="block mb-2.5 font-semibold text-lg text-primary max-lg:text-[15px] max-lg:mb-1">
                    Association loi 1901
                </span>
                <h1 class="text-[70px] text-white mb-2.5 max-lg:text-[28px] max-lg:mb-2.5">Bienvenue chez <br>Meow and Co</h1>
                <p class="text-body mb-5 text-lg max-lg:text-[15px] max-lg:mb-3">Notre association recueille, soigne et fait adopter des chats trouvés ou abandonnés pour leur offrir une seconde chance. Nous agissons dans les départements de Vendée (85), Charentes-Maritime (17) et Deux-Sèvres (79)<br><br>Rejoignez-nous pour changer leurs vies !</p>
                <a href="{{ route('liste-chats') }}" class="btn-orange-animated mt-2.5" wire:navigate data-pan="liste-chats">Découvrir les chats à adopter
                    <img src="{{ asset('build/images/svgs/button-white.svg') }}" alt="bouton flèche droite">
                </a>
            </div>
            <picture>
                <source srcset="{{ asset('build/images/meow/logo-carre.webp') }}" type="image/webp">
                <img src="{{ asset('build/images/meow/logo-carre.png') }}" alt="logo de l'association meow and co representant un chat roux assis avec des étoiles qui brillent autour de lui.">
            </picture>
        </div>
    </div>

    {{-- About --}}
    <div class="bg-cream py-[100px] pb-[150px] max-lg:py-[60px] max-lg:pb-[60px] relative">
        <div class="max-w-[1140px] mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-8">
                <div>
                    <div class="grid grid-cols-12 items-center gap-4">
                        <div class="col-span-12 lg:col-span-7">
                            @if($photo_principale)
                                <img src="{{ asset('storage/' . $photo_principale) }}" alt="Photo principale de l'association" class="rounded-lg" loading="lazy">
                            @else
                                <picture>
                                    <source srcset="{{ asset('build/images/meow/luna-1.webp') }}" type="image/webp">
                                    <img src="{{ asset('build/images/meow/luna-1.jpg') }}" alt="photo d'un chat gris et marron assis sur un arbre à chat. Il regarde vers la droite." class="rounded-lg" loading="lazy">
                                </picture>
                            @endif
                        </div>
                        <div class="col-span-12 lg:col-span-5 flex flex-col gap-6 max-lg:hidden">
                            <div>
                                @if($photo_secondaire_1)
                                    <img src="{{ asset('storage/' . $photo_secondaire_1) }}" alt="Photo secondaire 1 de l'association" class="rounded-lg" loading="lazy">
                                @else
                                    <picture>
                                        <source srcset="{{ asset('build/images/meow/chaton-1.webp') }}" type="image/webp">
                                        <img src="{{ asset('build/images/meow/chaton-1.jpg') }}" alt="photo d'un chaton noir et blanc alongé sur un coussin et qui tend ses pattes avant." class="rounded-lg" loading="lazy">
                                    </picture>
                                @endif
                            </div>
                            <div>
                                @if($photo_secondaire_2)
                                    <img src="{{ asset('storage/' . $photo_secondaire_2) }}" alt="Photo secondaire 2 de l'association" class="rounded-lg" loading="lazy">
                                @else
                                    <picture>
                                        <source srcset="{{ asset('build/images/meow/chaton-2.webp') }}" type="image/webp">
                                        <img src="{{ asset('build/images/meow/chaton-2.jpg') }}" alt="photo d'un chaton blanc alongé sur un arbre à chat. Il regarde vers la droite." class="rounded-lg" loading="lazy">
                                    </picture>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <span class="block font-semibold text-base text-primary mb-3 max-lg:text-[15px] max-lg:mb-2.5">
                        Notre histoire
                    </span>
                    <h2 class="text-[48px] mb-3 max-lg:text-[25px] max-lg:mb-2.5">L'association<br> Meow and Co</h2>
                    <p>Fondée en 2025 avec pour missions :</p>
                    <ul class="list-none pl-0 my-5 space-y-2.5">
                        <li class="relative pl-7 font-nunito font-bold text-heading">
                            <img src="{{ asset('build/images/svgs/about1.svg') }}" alt="icone coche" class="absolute left-0 top-[5px]">
                            Accueillir, soigner et faire adopter les chats et chatons abandonnés
                        </li>
                        <li class="relative pl-7 font-nunito font-bold text-heading">
                            <img src="{{ asset('build/images/svgs/about1.svg') }}" alt="icone coche" class="absolute left-0 top-[5px]">
                            Travailler en collaboration et en relai avec d'autres associations de protection animale
                        </li>
                        <li class="relative pl-7 font-nunito font-bold text-heading">
                            <img src="{{ asset('build/images/svgs/about1.svg') }}" alt="icone coche" class="absolute left-0 top-[5px]">
                            Sensibiliser au bien-être animal et à l'importance de la stérilisation auprès des particuliers et des collectivités
                        </li>
                    </ul>
                    <p>Tous les chats sont accueillis en famille d'accueil (FA) ce qui permet de leur apprendre la vie en maison et de mieux les connaitre pour vous les présenter</p>
                    <a href="{{ route('famille-accueil') }}" class="btn-orange-animated mt-2.5" wire:navigate data-pan="fa">
                        Devenir famille d'accueil
                        <img src="{{ asset('build/images/svgs/button-white.svg') }}" alt="bouton flèche droite">
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Cards "Nous aider" --}}
    <div class="relative text-center pt-[100px] pb-[45px] max-lg:pt-[60px] max-lg:pb-0">
        <div class="max-w-[1140px] mx-auto px-4">
            <div class="text-center mb-[35px] max-w-[680px] mx-auto max-lg:mb-5">
                <span class="block font-semibold text-base text-primary mb-3 max-lg:text-[15px] max-lg:mb-2.5">
                    Nous aider
                </span>
                <h2 class="text-[48px] mb-0 max-lg:text-[25px]">Meow and Co <br>a besoin de vous</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Card 1: Faire un don --}}
                <a href="{{ $site_dons }}" target="_blank" rel="noreferrer noopener" data-pan="don">
                    <div class="creativity-card mb-[35px] px-5 py-4 max-lg:mb-5 max-lg:px-5 max-lg:py-0">
                        <div class="w-[100px] h-[100px] max-lg:w-[70px] max-lg:h-[70px] rounded-full border-2 border-dashed border-primary flex items-center justify-center mx-auto mb-6 max-lg:mb-3 text-primary">
                            {{ svg('heroicon-s-currency-euro', 'w-10 h-10 max-lg:w-7 max-lg:h-7') }}
                        </div>
                        <h3 class="text-[22px] mb-5 max-lg:text-lg max-lg:mb-3">
                            Faire un don
                        </h3>
                        <p>Ponctuel ou régulier, votre don nous aide à accueillir et soigner toujours plus de chats dans le besoin</p>
                    </div>
                </a>

                {{-- Card 2: vide en lg, visible en sm --}}
                <div class="hidden lg:block"></div>
                <div class="hidden lg:block"></div>

                {{-- Card 3: Adopter --}}
                <a href="{{ route('adopter') }}" wire:navigate data-pan="adopter">
                    <div class="creativity-card mb-[35px] px-5 py-4 max-lg:mb-5 max-lg:px-5 max-lg:py-0">
                        <div class="w-[100px] h-[100px] max-lg:w-[70px] max-lg:h-[70px] rounded-full border-2 border-dashed border-primary flex items-center justify-center mx-auto mb-6 max-lg:mb-3 text-primary">
                            {{ svg('heroicon-s-heart', 'w-10 h-10 max-lg:w-7 max-lg:h-7') }}
                        </div>
                        <h3 class="text-[22px] mb-5 max-lg:text-lg max-lg:mb-3">
                            Adopter
                        </h3>
                        <p>En maison ou en appartement, que vous cherchiez un chaton ou un adulte, l'un de nos chats sera fait pour vous !</p>
                    </div>
                </a>

                {{-- Card 4: Relayer nos actions --}}
                <a href="{{ $facebook }}" target="_blank" rel="noreferrer noopener" data-pan="facebook">
                    <div class="creativity-card mb-[35px] px-5 py-4 max-lg:mb-5 max-lg:px-5 max-lg:py-0">
                        <div class="w-[100px] h-[100px] max-lg:w-[70px] max-lg:h-[70px] rounded-full border-2 border-dashed border-primary flex items-center justify-center mx-auto mb-6 max-lg:mb-3 text-primary">
                            {{ svg('heroicon-s-share', 'w-10 h-10 max-lg:w-7 max-lg:h-7') }}
                        </div>
                        <h3 class="text-[22px] mb-5 max-lg:text-lg max-lg:mb-3">
                            Relayer nos actions
                        </h3>
                        <p>Via nos réseaux et autour de vous, abonnez-vous et partagez sans modération !</p>
                    </div>
                </a>

                {{-- Espaces vides en lg --}}
                <div class="hidden lg:block"></div>
                <div class="hidden lg:block"></div>

                {{-- Card 5: Devenir FA --}}
                <a href="{{ route('famille-accueil') }}" wire:navigate data-pan="fa">
                    <div class="creativity-card mb-[35px] px-5 py-4 max-lg:mb-5 max-lg:px-5 max-lg:py-0">
                        <div class="w-[100px] h-[100px] max-lg:w-[70px] max-lg:h-[70px] rounded-full border-2 border-dashed border-primary flex items-center justify-center mx-auto mb-6 max-lg:mb-3 text-primary">
                            {{ svg('heroicon-s-building-office', 'w-10 h-10 max-lg:w-7 max-lg:h-7') }}
                        </div>
                        <h3 class="text-[22px] mb-5 max-lg:text-lg max-lg:mb-3">
                            Devenir famille d'accueil
                        </h3>
                        <p>Accompagné par l'association aidez-nous à sortir un ou plusieurs chats de la misère</p>
                    </div>
                </a>
            </div>
        </div>
        <picture>
            <source srcset="{{ asset('build/images/meow/don.webp') }}" type="image/webp">
            <img src="{{ asset('build/images/meow/don.jpg') }}" loading="lazy" class="mx-auto max-lg:w-[300px] max-lg:relative max-lg:bottom-0 lg:absolute lg:bottom-[140px] lg:left-0 lg:right-0" alt="illustration d'un chat roux assis qui lève une patte et plisse les yeux avec un sourire. Sur une pancarte à sa droite on peut lire Merci du fond du coeur pour votre don !" width="600">
        </picture>
    </div>
</main>
