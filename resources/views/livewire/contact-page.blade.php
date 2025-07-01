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
                                    <i class="fi fi-sr-marker"></i>
                                    <span>{{ $info_asso->adresse }} <br> {{ $info_asso->code_postal }} {{ $info_asso->ville }}</span>
                                </li>
                                <li>
                                    <i class="fi fi-sr-phone-call"></i>
                                    <a href="tel:{{ $info_asso->telephone }}">{{ $info_asso->telephone }}</a>
                                </li>
                                <li>
                                    <i class="fi fi-sr-envelope"></i>
                                    <a href="mailto:{{ $info_asso->email }}">{{ $info_asso->email }}</a>
                                </li>
                            </ul>

                            <ul class="social-list">
                                {{--<li>
                                    <a href="{{ $info_asso->facebook }}" id="my-element1" class="icon bg1">
                                        @svg('uni-facebook-f-o', 'w-75 pe-1 pb-2')
                                    </a>
                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
