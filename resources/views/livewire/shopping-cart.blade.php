<div>
    @if ($this->order)
        
        <div class="relative h-full p-10 overflow-hidden wrap">
            <div class="absolute h-full border border-gray-200 border-dashed border-2-2" style="left:9.1%"></div>
        
            <div class="flex items-center justify-between w-full mb-8">
                <div class="order-2 w-1/12"></div>
                <div class="z-20">
                    <div class="flex items-center w-10 h-10 bg-green-900 rounded-full">
                        <h1 class="mx-auto font-semibold text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </h1>
                    </div>
                </div>
                <div class="order-1 w-10/12 px-6 py-4 ml-4 bg-green-900 rounded-lg shadow-xl">
                    <div class="flex flex-row">
                        <h3 class="text-xl font-bold text-gray-200">{{ __('Ordre registrert') }}</h3>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between w-full mb-8">
                <div class="order-2 w-1/12"></div>
                <div class="z-20">
                    <div class="flex items-center w-10 h-10 {{ $this->order->paid === 1 ? 'bg-green-900' : 'bg-gray-900' }} rounded-full">
                        <h1 class="mx-auto font-semibold text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </h1>
                    </div>
                </div>
                <div class="order-1 w-10/12 px-6 py-4 ml-4 {{ $this->order->paid === 1 ? 'bg-green-900' : 'bg-gray-900' }} rounded-lg shadow-xl">
                    <div class="flex flex-row">
                        <h3 class="text-xl font-bold text-gray-200">{{ __('Betaling bekreftet') }}</h3>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between w-full mb-8">
                <div class="order-2 w-1/12"></div>
                <div class="z-20">
                    <div class="flex items-center w-10 h-10 {{ $this->order->ordered === 1 ? 'bg-green-900' : 'bg-gray-900' }} rounded-full">
                        <h1 class="mx-auto font-semibold text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                            </svg>
                        </h1>
                    </div>
                </div>
                <div class="order-1 w-10/12 px-6 py-4 ml-4 {{ $this->order->ordered === 1 ? 'bg-green-900' : 'bg-gray-900' }} rounded-lg shadow-xl">
                    <div class="flex flex-row">
                        <h3 class="text-xl font-bold text-gray-200">{{ __('Ordre bestilt') }}</h3>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between w-full">
                <div class="order-2 w-1/12"></div>
                <div class="z-20">
                    <div class="flex items-center w-10 h-10 bg-gray-900 rounded-full">
                        <h1 class="mx-auto font-semibold text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </h1>
                    </div>
                </div>
                <div class="order-1 w-10/12 px-6 py-4 ml-4 bg-gray-900 rounded-lg shadow-xl">
                    <div class="flex flex-row">
                        <h3 class="text-xl font-bold text-gray-200">{{ __('Spis maten') }}</h3>
                    </div>
                </div>
            </div>
        
        </div>
        
    @else
        <h1 class="mb-4 text-2xl text-green-200">Handlekurv</h1>
        <table class="table w-full" cellspacing="0">
            <thead>
                <tr class="p-4 font-bold uppercase border-b border-gray-500 whitespace-nowrap">
                    <th class="w-3/6 text-left">Navn</th>
                    <th class="w-1/6 text-center">Levering</th>
                    <th class="w-1/6 text-center">Stk</th>
                    <th class="w-1/6 text-right">Pris Stk</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr class="border-b border-gray-600">
                        <td class="w-3/6 py-4 text-left">{{ $item->name }}</td>
                        <td class="w-1/6 py-4 text-sm text-center">
                            {{ \Carbon\Carbon::parse($item->attributes->delivery_at)->toFormattedDateString() }}
                        </td>
                        <td class="w-1/6 py-4 text-center">
                            <button wire:click.defer="decrement({{ $item->id }})" class="text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                            {{ $item->quantity }}
                            @if($item->quantity < 10)
                                <button wire:click.defer="increment({{ $item->id }})" class="text-gray-400 hover:text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            @endif
                            <button wire:click.defer="remove({{ $item->id }})" class="mt-6 ml-3 text-red-400 sm:mt-0 lg:mt-6 xl:mt-0 hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                        <td class="w-1/6 py-4 text-right">
                            {{ $item->price }} kr
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="py-4 font-bold uppercase">
            Totalt: {{ $this->total }} kr
        </div>
        <div class="grid grid-cols-2 gap-4">
            <button class="px-2 py-1 text-red-100 transition-colors duration-150 bg-red-700 rounded-lg focus:shadow-outline hover:bg-red-800" wire:click="removeAll">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                {{ __('Fjern alt fra handlekurven') }}
            </button>
            <button class="px-2 py-1 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800" wire:click="order">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
                {{ __('Legg inn bestilling') }}
            </button>
        </div>
    @endif
</div>
