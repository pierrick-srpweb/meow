<main>
    {{-- Inner Hero --}}
    <div class="bg-peach pt-[170px] pb-[170px] max-lg:pt-[60px] max-lg:pb-[70px] relative">
        <div class="max-w-[1140px] mx-auto px-4">
            <div class="text-center">
                <h1 class="text-[48px] mb-2.5 max-lg:text-[30px] max-lg:mb-0">Nous contacter</h1>
            </div>
        </div>
    </div>

    <div class="py-[100px] max-lg:py-[60px]">
        <div class="max-w-[1140px] mx-auto px-4">
            <div class="pl-4">
                <div class="bg-cream border border-gray-200 rounded-[30px] p-[35px_40px] mb-10">
                    <h3 class="text-[22px] mb-4">Vous souhaitez nous contacter ?</h3>
                    <p>Privilégiez les messages sms ou email pour expliquer votre demande, nous vous recontacterons au plus vite</p>
                    <ul class="list-none p-0 m-0 space-y-3.5">
                        <li class="flex items-start gap-2">
                            @svg('heroicon-o-home', 'w-5 shrink-0 text-orange mt-0.5')
                            <span class="text-[#555]">{{ $info_asso->adresse }} <br> {{ $info_asso->code_postal }} {{ $info_asso->ville }}</span>
                        </li>
                        <li class="flex items-start gap-2">
                            @svg('heroicon-m-phone', 'w-5 shrink-0 text-orange mt-0.5')
                            <a href="tel:{{ $info_asso->telephone }}" class="text-[#555] hover:text-primary">{{ $info_asso->telephone }}</a>
                        </li>
                        <li class="flex items-start gap-2">
                            @svg('heroicon-o-envelope-open', 'w-5 shrink-0 text-orange mt-0.5')
                            <a href="mailto:{{ $info_asso->email }}" class="text-[#555] hover:text-primary">{{ $info_asso->email }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
