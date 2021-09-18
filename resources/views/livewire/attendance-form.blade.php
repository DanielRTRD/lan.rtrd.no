<div x-data="{ open: @entangle('noAttendance'), submitted: @entangle('hasAttendance') }">
    <div class="px-4 py-3 my-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert" x-show="submitted" x-cloak>
        <p class="font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>{{ __('Din deltakelse er registrert!') }}
        </p>
        <p>{{ __('Vi gleder oss til å se deg i slutten av oktober 😄') }}</p>
    </div>
    <button x-show="submitted" @click="open = !open" class="h-10 px-5 text-yellow-100 transition-colors duration-150 bg-yellow-800 rounded-lg focus:shadow-outline hover:bg-yellow-700" type="button" x-cloak>
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>{{ __('Endre') }}
    </button>
    <button x-show="submitted" wire:click="delete" class="h-10 px-5 text-red-100 transition-colors duration-150 bg-red-800 rounded-lg focus:shadow-outline hover:bg-red-700" type="button" x-cloak>
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>{{ __('Kanseller deltakelse') }}
    </button>
    <div x-show="open" x-transition.all.duration.200ms class="mt-2" x-cloak>
        <x-jet-form-section submit="save">
            <x-slot name="title">
                {{ __('Jeg vil være med!') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Vi trenger litt info fra deg før vi kan arrangere LAN hos oss.') }}

                <div class="px-4 py-3 my-2 text-sm leading-normal text-blue-700 bg-blue-100 rounded" role="alert">
                    <p><svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>{{ __('All informasjon som blir sendt inn her holdes privat og deles ikke videre. All data på denne nettsiden blir slettet innen 30 dager etter arrangementet.') }}</p>
                </div>
            </x-slot>

            <x-slot name="form">

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
                        <span class="ml-2 text-sm text-gray-300">{{ __('Jeg trenger dusjhåndkle') }}</span>
                    </label>
                    <x-jet-input-error for="towel" class="mt-2" />
                </div>

                <div class="col-span-6">
                    <label for="pillow_douvet" class="flex items-center">
                        <x-jet-checkbox id="pillow_douvet" class="" wire:model.defer="pillow_douvet" />
                        <span class="ml-2 text-sm text-gray-300">{{ __('Jeg trenger dyne og pute') }}</span>
                    </label>
                    <x-jet-input-error for="pillow_douvet" class="mt-2" />
                </div>

                <div class="col-span-6">
                    <label for="pillow_douvet_cover" class="flex items-center">
                        <x-jet-checkbox id="pillow_douvet_cover" class="" wire:model.defer="pillow_douvet_cover" />
                        <span class="ml-2 text-sm text-gray-300">{{ __('Jeg trenger dynetrekk/putetrekk') }}</span>
                    </label>
                    <x-jet-input-error for="pillow_douvet_cover" class="mt-2" />
                </div>

                <div class="col-span-6">
                    <label for="bringing_bed" class="flex items-center">
                        <x-jet-checkbox id="bringing_bed" class="" wire:model.defer="bringing_bed" />
                        <span class="ml-2 text-sm text-gray-300">{{ __('Jeg kan ta med luftmadrass/sammenleggbar gjesteseng ved behov') }}</span>
                    </label>
                    <x-jet-input-error for="bringing_bed" class="mt-2" />
                </div>
                
                <div class="col-span-6">
                    <x-jet-label for="vaccine" value="{{ __('Vaksinert?') }}" />
                    <select id="vaccine" name="vaccine" class="block w-full mt-1 text-gray-200 bg-black border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" wire:model.defer="vaccine">
                        <option value="">{{ __('--- Velg ---') }}</option>
                        <option value="8" {{ $vaccine == '8' ? 'selected' : '' }}>{{ __('Ingen vaksine') }}</option>
                        <option value="1" {{ $vaccine == '1' ? 'selected' : '' }}>{{ __('Første dose og det har gått tre til femten uker') }}</option>
                        <option value="2" {{ $vaccine == '2' ? 'selected' : '' }}>{{ __('Andre dose og det har gått én uke etter andre dose') }}</option>
                        <option value="9" {{ $vaccine == '9' ? 'selected' : '' }}>{{ __('Har hatt covid-19-sykdom de siste seks månedene') }}</option>
                    </select>
                    <p class="text-xs text-yellow-600">{{ __('Merk! Dette gjelder til arrangementet, og ikke på tidspunktet du sender inn info.') }}</p>
                    <x-jet-input-error for="vaccine" class="mt-2" />
                </div>

                <div class="col-span-6">
                    <x-jet-label for="comment" value="{{ __('Andre kommentarer til Daniel og Hanne? Vi kan legge til rette for deg om du har spesielle behov.') }}" />
                    <textarea id="comment" class="block w-full mt-1 text-gray-200 bg-black border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" wire:model.defer="comment"></textarea>
                    <x-jet-input-error for="comment" class="mt-2" />
                </div>

            </x-slot>
            

            <x-slot name="actions">
                <x-jet-action-message class="mr-3 text-green-500" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>
                <x-jet-button wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    </div>
</div>