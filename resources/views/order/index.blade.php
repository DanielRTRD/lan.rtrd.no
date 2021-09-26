<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-200">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="container px-4 pb-12 mx-auto mt-12 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @foreach ($orders as $order)
                @livewire('order-card', ['order' => $order])
            @endforeach
        </div>
    </div>
</x-app-layout>
