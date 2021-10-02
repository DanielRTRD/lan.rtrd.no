<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container px-4 pb-12 mx-auto mt-12 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            <div class="w-full px-1 my-1 md:w-full lg:my-4 lg:px-4 lg:w-1/2">
                <div class="p-8 py-4 overflow-hidden text-gray-200 bg-gray-800 rounded shadow-lg md:shadow-xl sm:rounded-lg">
                    <h1 class="py-2 text-2xl">Når? <span class="text-green-400">{{ \Carbon\Carbon::parse(env('LAN_START_DATE'))->toFormattedDateString() }} &mdash; {{ \Carbon\Carbon::parse(env('LAN_END_DATE'))->toFormattedDateString() }}</span></h1>
                    <h1 class="py-2 text-2xl">Hvor? <span class="text-green-400">Hjemme hos Daniel og Hanne<sup>&dagger;</sup></span></h1>
                    <h1 class="py-2 text-2xl">Svarfrist: <span class="text-green-400">{{ \Carbon\Carbon::parse(env('LAN_LAST_RESPONSE_DATE'))->toFormattedDateString() }}</span></h1>
                    <h1 class="py-2 text-2xl">Info:</h1>
                    <p class="my-2">Vi arranger enda et lite LAN i koronapandemien for å samle venner og bekjente siden det blir lite av det sånn ellers. I fysisk form altså, vi møtes jo til vanlig på Discord. 🥰</p>
                    <p class="my-2">Denne gangen så holder vi det over en uke i stedet for en lang helg. Vi håper at så mange som mulig kan komme, men det er begrenset til hvor mange vi har plass til i stua. 🤩</p>
                    <p class="my-2">Vi stiller selvfølgelig med klappstoler, bord og internett. Vi har to-tre kontorstoler som kan lånes. Ta med PC og/eller konsoll også koser vi oss! 🎮</p>
                    <p class="my-2">Vi har to katter, så om du er allergisk så er det nok lurt å ta med noen piller for det. Odin er glad i å spise myk plast (som feks plastposer) så prøv å ungå å ha med for mye av det, eventuelt gjem de i bag, sekk eller lignende! 😺</p>
                    <p class="my-2">Smittevern: Viktig at alle sammen passer på å vaske hendene og slikt for å minske smittefaren, selvom noen har fått vaksine(r)! 🧼</p>
                    <p class="my-2">Sengene blir prioritert til de som skal være her over lengre tid, håper det er forståelig. 😴</p>
                    <p class="my-2">Det er absolutt ikke noe krav til å være der under hele arrangementet, man kan komme å gå som man vil. Det er heller ikke noe krav for å bestille mat heller, det er butikker og kiosker i nærheten om man ønsker å handle middager der. 😉</p>
                    <p class="mt-2">Soveplasser:</p>
                    <ul class="ml-2 list-disc list-inside">
                        <li>Kjellerstue: <span class="text-green-400">To dobbelsenger og en sammenleggbar gjesteseng</span></li>
                        <li>Gjesterom: <span class="text-green-400">Dobbelseng</span></li>
                        <li>Kjellerrom: <span class="text-green-400">Sammenleggbar gjesteseng eller luftmadrass</span></li>
                        <li>Kontor: <span class="text-green-400">Plass til luftmadrass/sammenleggbar gjesteseng<sup>&dagger;&dagger;</sup></span></li>
                        <li>Åpen loftstue: <span class="text-green-400">Sovesofa og plass til flere luftmadrasser/sammenleggbar gjestesenger<sup>&dagger;&dagger;</sup></span></li>
                    </ul>
                    <div class="mt-6">
                        <p class="text-xs text-gray-500"><sup>&dagger;</sup> Send oss en PM for adresse</p>
                        <p class="text-xs text-gray-500"><sup>&dagger;&dagger;</sup> Senger må bringes for disse</p>
                    </div>
                </div>
            </div>
            <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
                <div class="p-8 py-4 overflow-hidden text-gray-200 bg-gray-800 rounded shadow-lg md:shadow-xl sm:rounded-lg">
                    @if(!auth()->user()->name)
                        <p class="font-bold">Vennligst legg til navnet ditt på <a href="{{ route('profile.show') }}" class="underline">profilen din</a>! 😇</p>
                        <div class="px-4 py-3 my-3 leading-normal text-blue-700 bg-blue-100 rounded-lg" role="alert">
                            <p><svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>{{ __('Vi trenger dette i tilfelle smitte under arrangementet. All informasjon som blir sendt inn her holdes privat og deles ikke videre. All data på denne nettsiden blir slettet innen 30 dager etter arrangementet.') }}</p>
                        </div>
                    @else
                        @livewire('attendance-form')
                    @endif
                </div>
            </div>
            <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2 xl:w-1/4">
                <div class="p-8 py-4 overflow-hidden text-gray-200 bg-gray-800 rounded shadow-lg md:shadow-xl sm:rounded-lg">
                    @livewire('attendance-list')
                </div>
            </div>
            <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2 xl:w-1/3">
                <div class="p-8 py-4 overflow-hidden text-gray-200 bg-gray-800 rounded shadow-lg md:shadow-xl sm:rounded-lg">
                    <ul class="ml-2 list-disc list-inside">
                        <h1 class="py-2 text-2xl">Huskeliste:</h1>
                        <li>Toalettsaker (tannbørste, tannkrem, deo osv)</li>
                        <li>Klær for de dagene du skal være her (vaskemaskin kan lånes)</li>
                        <li>Nettverkskabel (2-5 meter)</li>
                        <li>Strømforgrener (3-5 stikk)</li>
                        <li>Headset og mikrofon</li>
                        <li>Tastatur, mus og musematte for de med PC</li>
                        <li>Andre essensielle kabler til PC/Konsoll som feks strømkabel (Hint hint @ Tomas)</li>
                        <li>En skjerm som er innen for en grei størrelse (Hint hint @ Fredrik)</li>
                        <li>Gamingstol eller annen type kontor stol (vi har noen stoler)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
