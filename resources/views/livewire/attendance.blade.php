<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Jeg vil være med!') }}
    </x-slot>

    <x-slot name="description">
        Vi trenger litt info fra deg før vi kan arrangere LAN hos oss.
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="block w-full mt-1" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6">
            <label for="remember_me" class="flex items-center">
                <x-jet-checkbox id="cats" class="" wire:model.defer="state.email" />
                <span class="ml-2 text-sm text-gray-600">{{ __('Jeg aksepterer at jeg kan reagere på kattehår om jeg er allergisk') }}</span>
            </label>
            <x-jet-input-error for="cats" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
