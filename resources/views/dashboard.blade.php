<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container px-4 mx-auto my-12 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            <div class="w-full px-1 my-1 md:w-full lg:my-4 lg:px-4 lg:w-1/2">
                <div class="p-8 py-4 overflow-hidden bg-white rounded shadow-lg md:shadow-xl sm:rounded-lg">
                    <h1 class="py-2 text-2xl">Når? <span class="text-purple-500">{{ \Carbon\Carbon::parse(env('LAN_START_DATE'))->toFormattedDateString() }} &mdash; {{ \Carbon\Carbon::parse(env('LAN_END_DATE'))->toFormattedDateString() }}</span></h1>
                    <h1 class="py-2 text-2xl">Hvor? <span class="text-purple-500">Hjemme hos Daniel og Hanne<sup>&dagger;</sup></span></h1>
                    <h1 class="py-2 text-2xl">Info:</h1>
                    <p class="my-1">Vi arranger enda et lite LAN i koronapandemien for å samle venner og bekjente siden det blir lite av det sånn ellers. I fysisk form altså, vi møtes jo til vanlig på Discord. 🥰</p>
                    <p class="my-1">Denne gangen så holder vi det over en uke i stedet for en lang helg. Vi håper at så mange som mulig kan komme, men det er begrenset til hvor mange vi har plass til i stua. 🤩</p>
                    <p class="my-1">Vi stiller selvfølgelig med klappstoler, bord og internett. Vi har to-tre kontorstoler som kan lånes. Ta med PC og/eller konsoll også koser vi oss! 🎮</p>
                    <p class="my-1">Vi har to katter, så om du er allergisk så er det nok lurt å ta med noen piller for det. 🐱</p>
                    <p class="my-1">Smittevern: Viktig at alle sammen passer på å vaske hendene og slikt for å minske smittefaren, selvom noen har fått vaksine(r)! 🧼</p>
                    <p class="my-1">Sengene blir prioritert til de som skal være her over lengre tid, håper det er forståelig. 😴</p>
                    <p class="mt-2">Soveplasser:</p>
                    <ul class="ml-2 list-disc list-inside">
                        <li>Kjellerstue: <span class="text-purple-500">Dobbelseng, sammenleggbar gjesteseng og luftmadrass</span></li>
                        <li>Gjesterom: <span class="text-purple-500">Dobbelseng</span></li>
                        <li>Kjellerrom: <span class="text-purple-500">Sammenleggbar gjesteseng</span></li>
                        <li>Kontor: <span class="text-purple-500">Plass til luftmadrass/sammenleggbar gjesteseng<sup>&dagger;&dagger;</sup></span></li>
                        <li>Åpen loftstue: <span class="text-purple-500">Plass til flere luftmadrasser/sammenleggbar gjestesenger<sup>&dagger;&dagger;</sup></span></li>
                    </ul>
                    <div class="mt-6">
                        <p class="text-xs text-gray-500"><sup>&dagger;</sup> Send oss en PM for adresse</p>
                        <p class="text-xs text-gray-500"><sup>&dagger;&dagger;</sup> Senger må bringes for disse rommene</p>
                    </div>
                </div>
            </div>
            <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
                <div class="p-8 py-4 overflow-hidden bg-white rounded shadow-lg md:shadow-xl sm:rounded-lg">
                    @livewire('attendance-form')
                </div>
            </div>
            <div class="w-full px-1 my-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2 xl:w-1/4">
                <div class="p-8 py-4 overflow-hidden bg-white rounded shadow-lg md:shadow-xl sm:rounded-lg">
                    @livewire('attendance-list')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
