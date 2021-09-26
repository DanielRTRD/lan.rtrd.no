<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-200">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="container px-4 pb-12 mx-auto mt-12 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @foreach ($orders as $order)
                <div class="w-full px-1 my-1 lg:my-4 lg:px-4 md:w-1/2">
                    <div class="p-8 py-4 overflow-hidden text-gray-200 bg-gray-800 rounded shadow-lg md:shadow-xl sm:rounded-lg">
                        <p class="mb-2 text-2xl font-semibold">{{ $order->user->name }} <span class="text-xl text-gray-500">{{ $order->user->username }}</span></p>
                        <p>Ordre ID: <span class="text-green-400">{{ $order->id }}</span></p>
                        <p>Subtotal: <span class="text-green-400">{{ $order->amount }} kr</span></p>
                        <p>Bekreftet betalt: <span class="text-green-400">{{ $order->paid ? 'Ja' : 'Nei' }}</span></p>
                        <p>Bekreftet bestilt: <span class="text-green-400">{{ $order->ordered ? 'Ja' : 'Nei' }}</span></p>
                        <table class="table w-full mt-4" cellspacing="0">
                            <thead>
                                <tr class="p-4 font-bold uppercase border-b border-gray-500 whitespace-nowrap">
                                    <th class="w-4/6 text-left">Navn</th>
                                    <th class="w-1/6 text-center">Levering</th>
                                    <th class="w-1/6 text-center">Stk</th>
                                    <th class="w-1/6 text-right">Pris Stk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    <tr class="border-b border-gray-600">
                                        <td class="w-4/6 py-4 text-left">{{ $item->food->name }}</td>
                                        <td class="w-1/6 py-4 text-center">{{ \Carbon\Carbon::parse($item->food->delivery_at)->toFormattedDateString() }}</td>
                                        <td class="w-1/6 py-4 text-center">{{ $item->quantity }}</td>
                                        <td class="w-1/6 py-4 text-right">{{ $item->amount }} kr</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
