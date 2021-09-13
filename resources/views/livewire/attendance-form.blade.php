@if (auth()->user()->attendance()->count())
    <div class="px-4 py-3 my-2 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
        <p class="font-bold">Din deltakelse er registrert!</p>
        <p>Vi gleder oss til å se deg i oktober!</p>
    </div>
@else
    <x-jet-form-section submit="save">
        <x-slot name="title">
            {{ __('Jeg vil være med!') }}
        </x-slot>

        <x-slot name="description">
            Vi trenger litt info fra deg før vi kan arrangere LAN hos oss.
        </x-slot>

        <x-slot name="form">

            <!--
                - Jeg kommer X og reiser X
                - Jeg ønsker håndkle
                - Jeg ønsker dyne, pute og sengetøy
                - Jeg kan ta med luftmadrass/sammenleggbar gjesteseng
            -->

            <div class="col-span-6">
                <x-jet-label for="from_date" value="{{ __('Ankomst') }}" />
                <x-jet-input id="from_date" type="date" class="block w-full mt-1" wire:model.defer="from_date" min="{{ \Carbon\Carbon::parse(env('LAN_START_DATE'))->toDateString() }}" max="{{ \Carbon\Carbon::parse(env('LAN_END_DATE'))->toDateString() }}" />
                <x-jet-input-error for="from_date" class="mt-2" />
            </div>

            <div class="col-span-6">
                <x-jet-label for="to_date" value="{{ __('Avreise') }}" />
                <x-jet-input id="to_date" type="date" class="block w-full mt-1" wire:model.defer="to_date" min="{{ \Carbon\Carbon::parse(env('LAN_START_DATE'))->addDays(1)->toDateString() }}" max="{{ \Carbon\Carbon::parse(env('LAN_END_DATE'))->toDateString() }}" />
                <x-jet-input-error for="to_date" class="mt-2" />
            </div>

            <div class="col-span-6">
                <label for="towel" class="flex items-center">
                    <x-jet-checkbox id="towel" class="" wire:model.defer="towel" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Jeg trenger dusjhåndkle') }}</span>
                </label>
                <x-jet-input-error for="towel" class="mt-2" />
            </div>

            <div class="col-span-6">
                <label for="pillow_douvet" class="flex items-center">
                    <x-jet-checkbox id="pillow_douvet" class="" wire:model.defer="pillow_douvet" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Jeg trenger dyne og pute') }}</span>
                </label>
                <x-jet-input-error for="pillow_douvet" class="mt-2" />
            </div>

            <div class="col-span-6">
                <label for="pillow_douvet_cover" class="flex items-center">
                    <x-jet-checkbox id="pillow_douvet_cover" class="" wire:model.defer="pillow_douvet_cover" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Jeg trenger dynetrekk/putetrekk') }}</span>
                </label>
                <x-jet-input-error for="pillow_douvet_cover" class="mt-2" />
            </div>

            <div class="col-span-6">
                <label for="bringing_bed" class="flex items-center">
                    <x-jet-checkbox id="bringing_bed" class="" wire:model.defer="bringing_bed" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Jeg kan ta med luftmadrass/sammenleggbar gjesteseng ved behov') }}</span>
                </label>
                <x-jet-input-error for="bringing_bed" class="mt-2" />
            </div>

            <div class="col-span-6">
                <x-jet-label for="comment" value="{{ __('Andre kommentarer til Daniel eller Hanne? Vi kan legge til rette for deg om du har spesielle behov') }}" />
                <x-jet-input id="comment" type="text" class="block w-full mt-1" wire:model.defer="comment" />
                <x-jet-input-error for="comment" class="mt-2" />
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
@endif