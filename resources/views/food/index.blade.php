<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-200">
            {{ __('Food') }}
        </h2>
    </x-slot>

    <div class="container px-4 pb-12 mx-auto mt-12 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            <div class="w-full px-1 my-1 md:w-full lg:my-4 lg:px-4 lg:w-1/2">
                <div class="p-8 py-4 overflow-hidden text-gray-200 bg-gray-800 rounded shadow-lg md:shadow-xl sm:rounded-lg">
                    @livewire('food-list')
                </div>
            </div>
            <div class="w-full px-1 my-1 md:w-full lg:my-4 lg:px-4 lg:w-1/2">
                <div class="p-8 py-4 overflow-hidden text-gray-200 bg-gray-800 rounded shadow-lg md:shadow-xl sm:rounded-lg">
                    <h1 class="mb-4 text-2xl text-green-200">Handlekurv</h1>
                    @livewire('shopping-cart')
                </div>
            </div>
           
        </div>
    </div>
</x-app-layout>
