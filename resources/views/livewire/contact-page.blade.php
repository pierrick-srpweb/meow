<main>
    <!-- Inner Hero Warp Start -->
    <div class="inner-hero-warp">
        <div class="container">
            <div class="inner-hero-content">
                <h1>Nous contacter</h1>
            </div>
        </div>
    </div>
    <!-- Inner Hero Warp End -->


    <div class="contact-warp-start ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="service-small-warp">
                        <div class="events-info">
                            <h3>Vous souhaitez nous contacter ?</h3>
                            <p>Privilégiez les messages sms ou email pour expliquer votre demande, nous vous recontacterons au plus vite</p>
                            <ul class="icon-info">
                                <li>
                                    @svg('heroicon-o-home', 'icone-contact')
                                    <span class="ps-2">{{ $info_asso->adresse }} <br> {{ $info_asso->code_postal }} {{ $info_asso->ville }}</span>
                                </li>
                                <li>
                                    @svg('heroicon-m-phone', 'icone-contact')
                                    <a href="tel:{{ $info_asso->telephone }}" class="ps-2">{{ $info_asso->telephoneFormatted() }}</a>
                                </li>
                                <li>
                                    @svg('heroicon-o-envelope-open', 'icone-contact')
                                    <a href="mailto:{{ $info_asso->email }}" class="ps-2">{{ $info_asso->email }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
