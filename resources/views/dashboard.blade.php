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
                    <h1 class="py-2 text-2xl">Annen info:</h1>
                    <p>Soveplasser:</p>
                    <ul class="ml-2 list-disc list-inside">
                        <li>Kjellerstue: <span class="text-purple-500">Dobbelseng, sammenleggbar gjesteseng og luftmadrass</span></li>
                        <li>Gjesterom: <span class="text-purple-500">Dobbelseng</span></li>
                        <li>Kjellerrom: <span class="text-purple-500">Gjesteseng</span></li>
                        <li>Kontor: <span class="text-purple-500">Plass til luftmadrass/sammenleggbar gjesteseng<sup>&dagger;&dagger;</sup></span></li>
                        <li>Åpen loftstue: <span class="text-purple-500">Plass til flere luftmadrass/sammenleggbar gjesteseng<sup>&dagger;&dagger;</sup></span></li>
                    </ul>
                    <div class="mt-6">
                        <p class="text-xs text-gray-500"><sup>&dagger;</sup> Send oss en PM for adresse</p>
                        <p class="text-xs text-gray-500"><sup>&dagger;&dagger;</sup> Senger må bringes for disse rommene</p>
                    </div>
                </div>
            </div>
            <div class="p-8 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <h1 class="py-2 text-2xl">Jeg vil være med!</h1>
            </div>
        </div>
    </div>
</x-app-layout>
