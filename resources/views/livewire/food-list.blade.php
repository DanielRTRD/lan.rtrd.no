<div>
    @foreach($this->foods as $food)
        <div class="w-full border-b border-gray-700">
            <div class="px-5 py-3">
                <h3 class="text-gray-100">{{ $food->name }}</h3>
                <p class="text-green-500">{{ $food->price }} kr<span class="text-xs text-gray-400"> &mdash; {{ $food->delivery_at->toFormattedDateString() }}</span></p>
                <button class="px-2 py-1 text-xs text-white bg-green-800 rounded hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300" wire:click="add('{{ $food->id }}', '{{ $food->name }}', '{{ $food->delivery_at }}', '{{ $food->price }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Legg til
                </button>
            </div>
        </div>
    @endforeach
</div>
