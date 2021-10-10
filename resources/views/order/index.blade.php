<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-200">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="container px-4 pb-12 mx-auto mt-12 md:px-12">
        <p class="text-gray-200 print:text-black print:mt-10 print:border-b print:py-2">Subtotal alle ordre: <span class="text-green-400">{{ $orders->sum('amount') }} kr</span></p>
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @foreach ($orders as $order)
                @livewire('order-card', ['order' => $order])
            @endforeach
        </div>
    </div>
</x-app-layout>
