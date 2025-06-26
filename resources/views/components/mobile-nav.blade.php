<div class="responsive-navbar offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvas">
    <div class="offcanvas-header">
        <a href="index.html" class="logo d-inline-block">
            <img src="{{ asset('build/images/logo.svg') }}" alt="logo">
        </a>
        <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="ri-close-line"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="accordion" id="navbarAccordion">
            <div class="accordion-item">
                <a class="accordion-button without-icon" href="{{ route('home') }}">
                    Accueil
                </a>
            </div>
            <div class="accordion-item">
                <a class="accordion-button without-icon" href="{{ route('liste-chats') }}">
                    Les chats et chatons à adopter
                </a>
            </div>
            <div class="accordion-item">
                <a class="accordion-button without-icon" href="{{ route('adopter') }}">
                    Comment adopter ?
                </a>
            </div>
            <div class="accordion-item">
                <a class="accordion-button without-icon" href="{{ route('contact') }}">
                    Nous contacter
                </a>
            </div>
        </div>
        <div class="others-option d-flex align-items-center">

            <div class="option-item">
                <a href="{{ route('adopter') }}" class="default-btn style1"> Adopter un chat
                    <img src="{{ asset('build/images/svgs/button-white.svg') }}" alt="image">
                </a>
            </div>

            <div class="option-item">
                <div class="search-bar">
                    <div class="modal-search">
                        <button class="open-button" onclick="openSearch()">
                            <img src="{{ asset('build/images/svgs/search1.svg') }}" alt=""></button>
                        <div id="myOverlay" class="overlay">
                            <span class="close-btn" onclick="closeSearch()" title="Close Overlay">×</span>
                            <div class="overlay-content" >
                                <form >
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <button type="submit" class="search-btn">
                                        <img src="{{ asset('build/images/svgs/search1.svg') }}" alt="">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="option-item">
                <button class="btn side-bar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <img src="{{ asset('build/images/svgs/dotsmenu1.svg') }}" alt="">
                </button>
            </div>

        </div>
    </div>
</div>
