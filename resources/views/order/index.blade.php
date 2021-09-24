<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-200">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="container px-4 pb-12 mx-auto mt-12 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @foreach ($orders as $order)
                <div class="w-full px-1 my-1 lg:my-4 lg:px-4 md:w-1/2 xl:w-1/3">
                    <div class="p-8 py-4 overflow-hidden text-gray-200 bg-gray-800 rounded shadow-lg md:shadow-xl sm:rounded-lg">
                        <p class="mb-2 text-2xl font-semibold">{{ $order->user->name }} <span class="text-xl text-gray-500">{{ $order->user->username }}</span></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
