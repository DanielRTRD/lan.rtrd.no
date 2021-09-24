<div>
    @foreach($this->foods as $food)
        <div class="w-full border-b border-gray-700">
            <div class="px-5 py-3">
                <h3 class="text-gray-100">{{ $food->name }}</h3>
                <p class="text-green-500">{{ $food->price }} kr<span class="text-xs text-gray-400"> &mdash; {{ $food->delivery_at->toFormattedDateString() }}</span></p>
                <button class="px-2 py-1 text-xs text-white bg-green-800 rounded" wire:click="add('{{ $food->id }}', '{{ $food->name }}', '{{ $food->delivery_at }}', '{{ $food->price }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                    Legg til
                </button>
            </div>
        </div>
    @endforeach
</div>
