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
                    @if(!in_array($chat->categorie, ['Adopté', 'Etoile'], true))
                        <div class="text-center pb-5">
                            <a href="{{ route('adopter') }}" class="default-btn style2">
                                <span>Je l'adopte !</span>
                                <img src="{{ asset('build/images/svgs/button-white.svg') }}" alt="image">
                            </a>
                        </div>
                    @endif
                    <div class="service-small-warp">
                        <div class="events-info">
                            <h3>Son CV</h3>
                            @if($chat->description)
                                <p>{!! $chat->description !!}</p>
                            @endif
                            <ul class="date-info">
                                <li>Date de naissance :
                                    <span>{{ isset($chat->sexe) ? \Carbon\Carbon::parse($chat->date_naissance)->locale('fr_FR')->isoFormat('DD MMMM YYYY') : 'inconnue' }}</span>
                                </li>
                                <li>Sexe
                                    :<span>{{ isset($chat->sexe) ? Str::ucwords($chat->sexe) : 'Non renseigné' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    @if($chat->getMedia('photos')->isNotEmpty())
                        <div class="photos-gallery-warp mt-5" id="gallery-chat">
                            <div class="text-center mb-4">
                                <h3>Galerie photos</h3>
                                <span>Cliquez sur la photo pour l'agrandir</span>
                            </div>
                            <div class="row justify-content-center g-3">
                                @foreach($chat->getMedia('photos')->sortBy('order_column') as $photo)
                                    @php
                                        $dimensions = getimagesize($photo->getPath());
                                        $width = $dimensions ? $dimensions[0] : 1200;
                                        $height = $dimensions ? $dimensions[1] : 800;
                                    @endphp
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <div class="photo-item">
                                            <a href="{{ $photo->getUrl() }}"
                                               data-pswp-width="{{ $width }}"
                                               data-pswp-height="{{ $height }}"
                                               target="_blank">
                                                <img
                                                    src="{{ $photo->getUrl('preview') }}"
                                                    alt="Photo de {{ $chat->nom }}"
                                                    class="img-fluid rounded shadow-sm"
                                                    style="width: 100%; height: 200px; object-fit: cover; cursor: pointer;">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</main>
