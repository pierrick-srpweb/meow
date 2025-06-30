<main>
    <!-- Hero Style3 Warp Start -->
    <div class="hero-style3-warp">
        <div class="container-fluid d-flex flex-column flex-md-row justify-content-md-between align-items-center">
            <div class="hero-style3-content me-0 me-md-3">
                <span class="title">
                    Association loi 1901
                </span>
                <h1>Bienvenue chez <br>Meow and Co</h1>
                <p>Notre association recueille, soigne et fait adopter des chats trouvés ou abandonnés pour leur offrir une seconde chance. Nous agissons dans les départements de Vendée (85), Charentes-Maritime (17) et Deux-Sèvres (79)<br><br>Rejoignez-nous pour changer leurs vies !</p>
                <a href="{{ route('liste-chats') }}" class="default-btn style2" wire:navigate>Découvrir les chats à adopter
                    <img src="{{ asset('build/images/svgs/button-white.svg') }}"  alt="bouton flèche droite">
                </a>
            </div>
            <img src="{{ asset('build/images/meow/logo-carre.png') }}" class="hero-style3-main d-none d-md-block" alt="logo de l'association meow and co representant un chat roux assis avec des étoiles qui brillent autour de lui.">
        </div>
    </div>
    <!-- Hero Style3 Warp End -->

    <!-- Baby Care Warp Start -->
    <div class="baby-care-warp ptb-100 bg-FCF9F4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="baby-care-image">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="image">
                                    <img src="{{ asset('build/images/meow/luna-1.jpg') }}" alt="photo d'un chat gris et marron assis sur un arbre à chat. Il regarde vers la droite.">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="image style3-about2">
                                    <img src="{{ asset('build/images/meow/chaton-1.jpg') }}" alt="photo d'un chaton noir et blanc alongé sur un coussin et qui tend ses pattes avant.">
                                </div>
                                <div class="image">
                                    <img src="{{ asset('build/images/meow/chaton-2.jpg') }}" alt="photo d'un chaton blanc alongé sur un arbre à chat. Il regarde vers la droite.">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="more-about-content single-section">
                    <span class="title">
                        {{--<img src="{{ asset('build/images/shapes/home3-title.png') }}" alt="image">--}}
                        Notre histoire
                    </span>
                        <h2>L'association<br> Meow and Co</h2>
                        <p>Fondée en 2025 avec pour missions :</p>
                        <ul class="more-about-list">
                            <li>
                                <img src="{{ asset('build/images/svgs/about1.svg') }}" alt="icone coche">
                                Accueillir, soigner et faire adopter les chats et chatons abandonnés
                            </li>
                            <li>
                                <img src="{{ asset('build/images/svgs/about1.svg') }}" alt="icone coche">
                                Travailler en collaboration et en relai avec d'autres association de protection animale
                            </li>
                            <li>
                                <img src="{{ asset('build/images/svgs/about1.svg') }}" alt="icone coche">
                                Sensibiliser au bien-être animal et à l'importance de la stérilisation auprès des particulier et des collectivités
                            </li>
                        </ul>
                        <p>Tous les chats sont accueillis en famille d'accueil (FA) ce qui permet de leur apprendre la vie en maison et de mieux les connaitre pour vous les présenter</p>
                        <a href="{{ route('famille-accueil') }}" class="default-btn style2" wire:navigate>
                            Devenir famille d'accueil
                            <img src="{{ asset('build/images/svgs/button-white.svg') }}" alt="bouton flèche droite">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Baby Care Warp End -->

    <!-- Creativity Warp Start -->
    <div class="creativity-warp pt-100">
        <div class="container">
            <div class="section-title">
            <span class="title">
                {{--<img src="{{ asset('build/images/shapes/home3-title.png') }}" class="home3-title" alt="image">--}}
                Nous aider
            </span>
                <h2>Meow and Co <br>a besoin de vous</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ $site_dons }}" target="_blank" rel="noreferrer noopener">
                        <div class="creativity-card">
                            <div class="icon d-flex">
                                {{ svg('heroicon-s-currency-euro') }}
                            </div>
                            <h3>
                                Faire un don
                            </h3>
                            <p>Ponctuel ou régulier, votre don nous aide à accueillir et soigner toujours plus de chats dans le besoin</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('adopter') }}" wire:navigate>
                        <div class="creativity-card">
                            <div class="icon d-flex">
                                {{ svg('heroicon-s-heart') }}
                            </div>
                            <h3>
                                Adopter
                            </h3>
                            <p>En maison ou en appartement, que vous cherchiez un chaton ou un adulte, l'un de nos chats sera fait pour vous !</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ $facebook }}" target="_blank" rel="noreferrer noopener">
                        <div class="creativity-card">
                            <div class="icon d-flex">
                                {{ svg('heroicon-s-share') }}
                            </div>
                            <h3>
                                Relayer nos actions
                            </h3>
                            <p>Via nos réseaux et autour de vous, abonnez-vous et partagez sans modération !</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('famille-accueil') }}" wire:navigate>
                        <div class="creativity-card">
                            <div class="icon d-flex">
                                {{ svg('heroicon-s-building-office') }}
                            </div>
                            <h3>
                                Devenir famille d'accueil
                            </h3>
                            <p>Accompagné par l'association aidez nous à sortir un ou plusieurs chats de la misère</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <img src="{{ asset('build/images/meow/don.jpg') }}" class="creativity1" alt="illustration d'un chat roux assis qui lève une patte et plisse les yeux avec un sourire. Sur une pancarte à sa droite on peut lire Merci du fond du coeur pour votre don !" width="600px">
    </div>
    <!-- Creativity Warp End -->
</main>
