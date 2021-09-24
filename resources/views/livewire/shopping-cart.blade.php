<div>
    <table class="table w-full" cellspacing="0">
        <thead>
            <tr class="p-4 font-bold uppercase border-b border-gray-500 whitespace-nowrap">
                <th class="w-4/6 text-left">Navn</th>
                <th class="w-1/6 text-left">Stk</th>
                <th class="w-1/6 text-right">Pris Stk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
                <tr class="border-b border-gray-600">
                    <td class="w-4/6 py-4 text-left">{{ $item->name }} <span class="text-xs text-gray-400">({{ \Carbon\Carbon::parse($item->attributes->delivery_at)->toFormattedDateString() }})</span></td>
                    <td class="w-1/6 py-4 text-left">
                        <button wire:click="decrement({{ $item->id }})" class="text-gray-400 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                        {{ $item->quantity }}
                        <button wire:click="increment({{ $item->id }})" class="text-gray-400 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                        <button wire:click="remove({{ $item->id }})" class="mt-6 ml-3 text-red-400 sm:mt-0 lg:mt-6 xl:mt-0 hover:text-red-600">
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
</div>
