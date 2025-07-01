<main>
    <!-- Inner Hero Warp Start -->
    <div class="inner-hero-warp">
        <div class="container">
            <div class="inner-hero-content">
                <h1>{{ Str::upper($chat->nom) }}</h1>
            </div>
        </div>
    </div>
    <!-- Inner Hero Warp End -->

    <div class="portfolio-warp pt-5 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pb-5">
                    @if($cv)
                        <div class="text-center mb-5">
                            <img class="class-image-four" src="{{ $cv  }}" alt="image">
                        </div>
                    @endif
                    <div class="text-center pb-5">
                        <a href="{{ route('adopter') }}" class="default-btn style2">
                            <span>Je l'adopte !</span>
                            <img src="{{ asset('build/images/svgs/button-white.svg') }}" alt="image">
                        </a>
                    </div>
                    <div class="service-small-warp">
                        <div class="events-info">
                            <h3>Son CV</h3>
                            @if($chat->description)
                                <p>{{ $chat->description }}</p>
                            @endif
                            <ul class="date-info">
                                <li>Date de naissance : <span>{{ \Carbon\Carbon::parse($chat->date_naissance)->locale('fr_FR')->isoFormat('DD MMMM YYYY') }}</span></li>
                                <li>Sexe :<span>{{ Str::ucwords($chat->sexe) }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
