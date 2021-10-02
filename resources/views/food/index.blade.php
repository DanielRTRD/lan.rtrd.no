<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-200">
            {{ __('Food') }}
        </h2>
    </x-slot>
    
        <div class="container px-4 pb-12 mx-auto mt-12 md:px-12">
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
                @if(auth()->user()->attendance)
                    <div class="w-full px-1 my-1 md:w-full lg:my-4 lg:px-4 lg:w-1/2">
                        <div class="p-8 py-4 overflow-hidden text-gray-200 bg-gray-800 rounded shadow-lg md:shadow-xl sm:rounded-lg">
                            @livewire('food-list')
                        </div>
                    </div>
                    <div class="w-full px-1 my-1 md:w-full lg:my-4 lg:px-4 lg:w-1/2">
                        <div class="p-8 py-4 overflow-hidden text-gray-200 bg-gray-800 rounded shadow-lg md:shadow-xl sm:rounded-lg">
                            @livewire('shopping-cart')
                        </div>
                    </div>
                @else
                    <div class="px-4 py-3 my-2 text-sm leading-normal text-blue-700 bg-blue-100 rounded" role="alert">
                        <p><svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>{{ __('Du må delta på arrangementet for å bli med på felles bestillingen for Makroboks.') }}</p>
                    </div>
                @endif
            </div>
        </div>
</x-app-layout>
