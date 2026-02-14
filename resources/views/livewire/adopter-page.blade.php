<main>
    <!-- Inner Hero Warp Start -->
    <div class="inner-hero-warp">
        <div class="container">
            <div class="inner-hero-content">
                <h1>Procédure d'adoption</h1>
            </div>
        </div>
    </div>
    <!-- Inner Hero Warp End -->

    <div class="terms-conditions-area pt-100 pb-75">
        <div class="container">
            <div class="terms-conditions">
                <div class="conditions-content">
                    <h3>Un chat ou un chaton vous plait ?</h3>
                    <p>Appelez-nous au <b><a href="tel:{{ $info_asso->telephone }}">{{ $info_asso->telephoneFormatted() }}</a></b> pour une première prise de contact et discuter ensemble de votre projet d'adoption.</p>
                </div>

                <div class="conditions-content">
                    <h3>Nos tarifs d'adoption</h3>
                    <table class="table">
                        @foreach($tarifs as $tarif)
                            <tr>
                                <td>{{ $tarif['prestation'] }}</td>
                                <td class="text-end">{{ $tarif['prix'] }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <b>Un chèque de caution 170 euros sera conservé jusqu’à réception du justificatif de stérilisation</b>
                </div>
            </div>
        </div>
    </div>
</main>
