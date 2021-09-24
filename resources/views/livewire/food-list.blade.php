<div>
    @if ($this->order)
        <h1 class="mb-4 text-2xl text-green-200">{{ __('Din Ordre') }}</h1>
        {{ $this->order }}
    @else
        <h1 class="mb-4 text-2xl text-green-200">Meny</h1>
        <div class="px-4 py-3 my-2 text-sm leading-normal text-blue-700 bg-blue-100 rounded" role="alert">
            <p><svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>{{ __('Siste dagen for å legge inn bestilling på mat er :date! Vi bestiller opp ordre som er lagt inn og betalt dagen etter.', ['date' => \Carbon\Carbon::parse($this->last_order_date)->toFormattedDateString()]) }}</p>
        </div>
        @foreach($this->foods as $food)
            <div class="w-full border-t border-gray-700">
                <div class="px-5 py-3">
                    <h3 class="text-gray-100">{{ $food->name }}</h3>
                    <p class="text-green-500"><svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg> {{ $food->price }} kr<span class="ml-4 text-sm text-gray-400"><svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                      </svg> {{ $food->delivery_at->toFormattedDateString() }}</span></p>
                    <button class="px-2 py-1 text-xs text-white bg-green-800 rounded hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300" wire:click.defer="add('{{ $food->id }}', '{{ $food->name }}', '{{ $food->delivery_at }}', '{{ $food->price }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Legg til
                    </button>
                </div>
            </div>
        @endforeach
    @endif
</div>
