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
                <a href="about.html" class="default-btn style2">Découvrir les chats à adopter
                    <img src="{{ asset('build/images/svgs/button-white.svg') }}"  alt="">
                </a>
            </div>
            <img src="{{ asset('build/images/meow/logo-carre.png') }}" class="hero-style3-main d-none d-md-block" alt="image">
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
                                    <img src="{{ asset('build/images/abouts/style3-about1.png') }}" alt="image">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="image style3-about2">
                                    <img src="{{ asset('build/images/abouts/style3-about2.png') }}" alt="image">
                                </div>
                                <div class="image">
                                    <img src="{{ asset('build/images/abouts/style3-about3.png') }}" alt="image">
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
                                <img src="{{ asset('build/images/svgs/about1.svg') }}" alt="svg">
                                Accueillir, soigner et faire adopter les chats et chatons abandonnés
                            </li>
                            <li>
                                <img src="{{ asset('build/images/svgs/about1.svg') }}" alt="svg">
                                Travailler en collaboration et en relai avec d'autres association de protection animale
                            </li>
                            <li>
                                <img src="{{ asset('build/images/svgs/about1.svg') }}" alt="svg">
                                Sensibiliser au bien-être animal et à l'importance de la stérilisation auprès des particulier et des collectivités
                            </li>
                        </ul>
                        <p>Tous les chats sont accueillis en famille d'accueil (FA) ce qui permet de leur apprendre la vie en maison et de mieux les connaitre pour vous les présenter</p>
                        <a href="about.html" class="default-btn style2">
                            Devenir famille d'accueil
                            <img src="{{ asset('build/images/svgs/button-white.svg') }}" alt="svg">
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
                    <div class="creativity-card">
                        <div class="icon">
                            <img src="{{ asset('build/images/svgs/creativity1.svg') }}"  alt="img">
                        </div>
                        <h3>
                            <a href="{{ $site_dons }}" target="_blank" rel="noreferrer noopener">Faire un don</a>
                        </h3>
                        <p>Ponctuel ou régulier, votre don nous aide à accueillir et soigner toujours plus de chats dans le besoin</p>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3 col-sm-6">
                    <div class="creativity-card">
                        <div class="icon">
                            <img src="{{ asset('build/images/svgs/creativity2.svg') }}"  alt="img">
                        </div>
                        <h3>
                            <a href="{{ route('adopter') }}" wire:navigate>Adopter</a>
                        </h3>
                        <p>En maison ou en appartement, que vous cherchiez un chaton ou un adulte, l'un de nos chats sera fait pour vous !</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="creativity-card">
                        <div class="icon">
                            <img src="{{ asset('build/images/svgs/creativity3.svg') }}"  alt="img">
                        </div>
                        <h3>
                            <a href="{{ $facebook }}" target="_blank" rel="noreferrer noopener">Relayer nos actions</a>
                        </h3>
                        <p>Via nos réseaux et autour de vous, abonnez-vous et partagez sans modération !</p>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3 col-sm-6">
                    <div class="creativity-card">
                        <div class="icon">
                            <img src="{{ asset('build/images/svgs/creativity4.svg') }}"  alt="img">
                        </div>
                        <h3>
                            <a href="{{ route('famille-accueil') }}" wire:navigate>Devenir famille d'accueil</a>
                        </h3>
                        <p>Accompagné par l'association aidez nous à sortir un ou plusieurs chats de la misère</p>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('build/images/abouts/creativity1.png') }}" class="creativity1" alt="image">
        {{--<div class="all-shapes">
            <img src="{{ asset('build/images/shapes/creativity-shape1.png') }}" class="creativity-shape1" alt="image">
            <img src="{{ asset('build/images/shapes/creativity-shape2.png') }}" class="creativity-shape2" alt="image">
            <img src="{{ asset('build/images/shapes/creativity-shape3.png') }}" class="creativity-shape3" alt="image">
            <img src="{{ asset('build/images/shapes/creativity-shape4.png') }}" class="creativity-shape4" alt="image">
        </div>--}}
    </div>
    <!-- Creativity Warp End -->
</main>
