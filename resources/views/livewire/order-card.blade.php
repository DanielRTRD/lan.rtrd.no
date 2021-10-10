<div class="w-full px-1 my-1 lg:my-4 lg:px-4 md:w-1/2 print:w-full print:p-0">
    <div class="p-8 py-4 overflow-hidden text-gray-200 bg-gray-800 rounded shadow-lg md:shadow-xl sm:rounded-lg print:shadow-none print:p-0 print:border-b print:pb-4">
        <p class="mb-2 text-2xl font-semibold print:hidden">{{ $order->user->name }} <span class="text-xl text-gray-500">{{ $order->user->username }}</span></p>
        <button class="px-2 py-1 text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800 print:hidden" wire:click="paid">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            @if ($order->paid)
                {{ __('Merk som ikke betalt') }}
            @else
                {{ __('Merk som betalt') }}
            @endif
        </button>
        @if ($order->paid)
            <button class="px-2 py-1 text-blue-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800" wire:click="ordered">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
                @if ($order->ordered)
                    {{ __('Merk som ikke bestilt') }}
                @else
                    {{ __('Merk som bestilt') }}
                @endif
            </button>
        @endif
        <p class="mt-4 print:hidden">Ordre ID: <span class="text-green-400">{{ $order->id }}</span></p>
        <p class="hidden print:inline-block">Ref: <span class="text-green-400">{{ $order->id }}</span></p>
        <p>Subtotal: <span class="text-green-400">{{ $order->amount }} kr</span></p>
        <p class="print:hidden">Bekreftet betalt: <span class="text-green-400">{{ $order->paid ? 'Ja' : 'Nei' }}</span></p>
        <p class="print:hidden">Bekreftet bestilt: <span class="text-green-400">{{ $order->ordered ? 'Ja' : 'Nei' }}</span></p>
        <table class="table w-full mt-4" cellspacing="0">
            <thead>
                <tr class="p-4 font-bold uppercase border-b border-gray-500 whitespace-nowrap">
                    <th class="w-3/6 text-left">Navn</th>
                    <th class="w-1/6 text-center">Levering</th>
                    <th class="w-1/6 text-center">Stk</th>
                    <th class="w-1/6 text-right print:hidden">Pris Stk</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items->sortBy('delivery_at') as $item)
                    <tr class="border-b border-gray-600">
                        <td class="w-3/6 py-4 text-left">{{ $item->food->name }}</td>
                        <td class="w-1/6 py-4 text-center">{{ \Carbon\Carbon::parse($item->food->delivery_at)->toFormattedDateString() }}</td>
                        <td class="w-1/6 py-4 text-center">{{ $item->quantity }}</td>
                        <td class="w-1/6 py-4 text-right print:hidden">{{ $item->amount }} kr</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
