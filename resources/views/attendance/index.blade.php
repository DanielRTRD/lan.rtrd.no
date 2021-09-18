<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-200">
            {{ __('Attendance') }}
        </h2>
    </x-slot>

    <div class="container px-4 pb-12 mx-auto mt-12 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @foreach ($attendances as $attendance)
                <div class="w-full px-1 my-1 lg:my-4 lg:px-4 md:w-1/2 xl:w-1/3">
                    <div class="p-8 py-4 overflow-hidden text-gray-200 bg-gray-800 rounded shadow-lg md:shadow-xl sm:rounded-lg">
                        <p class="mb-2 text-2xl font-semibold">{{ $attendance->user->name }} <span class="text-xl text-gray-500">{{ $attendance->user->username }}</span></p>
                        <p class="pt-1">{{ __('Ankomst') }}: <span class="text-green-400">{{ \Carbon\Carbon::parse($attendance->from_date)->toFormattedDateString() }}</span></p>
                        <p class="pt-1">{{ __('Avreise') }}: <span class="text-green-400">{{ \Carbon\Carbon::parse($attendance->to_date)->toFormattedDateString() }}</span></p>
                        <p class="pt-1">{{ __('Jeg trenger dusjhåndkle') }}: <span class="text-green-400">{{ $attendance->towel ? 'Ja' : 'Nei' }}</span></p>
                        <p class="pt-1">{{ __('Jeg trenger dyne og pute') }}: <span class="text-green-400">{{ $attendance->pillow_douvet ? 'Ja' : 'Nei' }}</span></p>
                        <p class="pt-1">{{ __('Jeg trenger dynetrekk/putetrekk') }}: <span class="text-green-400">{{ $attendance->pillow_douvet_cover ? 'Ja' : 'Nei' }}</span></p>
                        <p class="pt-1">{{ __('Jeg kan ta med luftmadrass/sammenleggbar gjesteseng ved behov') }}: <span class="text-green-400">{{ $attendance->bringing_bed ? 'Ja' : 'Nei' }}</span></p>
                        <p class="pt-1">{{ __('Vaksinert?') }}
                            <span class="text-green-400">
                                @if ($attendance->vaccine == 8)
                                    {{ __('Ingen vaksine') }}
                                @elseif ($attendance->vaccine == 1)
                                    {{ __('Første dose og det har gått tre til femten uker') }}
                                @elseif ($attendance->vaccine == 2)
                                    {{ __('Andre dose og det har gått én uke etter andre dose') }}
                                @elseif ($attendance->vaccine == 9)
                                    {{ __('Har hatt covid-19-sykdom de siste seks månedene') }}
                                @endif
                            </span>
                        </p>
                        <p class="pt-1">{{ __('Andre kommentarer') }}:<br><span class="text-green-400">{{ $attendance->comment }}</span></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
