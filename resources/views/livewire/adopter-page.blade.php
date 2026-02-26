<main id="main-content">
    {{-- Inner Hero --}}
    <div class="bg-peach pt-[170px] pb-[170px] max-lg:pt-[60px] max-lg:pb-[70px] relative">
        <div class="container-bs">
            <div class="text-center">
                <h1 class="text-[48px] mb-2.5 max-lg:text-[30px] max-lg:mb-0">Procédure d'adoption</h1>
            </div>
        </div>
    </div>

    <div class="py-[100px] pb-[75px] max-lg:py-[60px] max-lg:pb-[35px]">
        <div class="container-bs">
            <div class="mb-8">
                <h2 class="mb-4 font-bold text-heading">Un chat ou un chaton vous plait ?</h3>
                <p class="text-[#555]">Appelez-nous au <b><a href="tel:{{ $info_asso->telephone }}">{{ $info_asso->telephoneFormatted() }}</a></b> pour une première prise de contact et discuter ensemble de votre projet d'adoption.</p>
            </div>

            <div class="mb-8">
                <h2 class="mb-4 font-bold text-heading">Nos tarifs d'adoption</h3>
                <table class="w-full border-collapse">
                    <caption class="sr-only">Tarifs d'adoption</caption>
                    <thead class="sr-only">
                        <tr>
                            <th scope="col">Prestation</th>
                            <th scope="col">Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tarifs as $tarif)
                            <tr class="border-b border-gray-200">
                                <td class="py-3 pr-4 text-[#555]">{{ $tarif['prestation'] }}</td>
                                <td class="py-3 text-right font-semibold whitespace-nowrap">{{ $tarif['prix'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <b class="block mt-4">Un chèque de caution 170 euros sera conservé jusqu'à réception du justificatif de stérilisation</b>
            </div>
        </div>
    </div>
</main>
