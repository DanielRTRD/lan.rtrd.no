<div>
    <h1 class="py-2 text-2xl">{{ $count .' '. trans_choice('{1} deltaker|[2,*] deltakere', $count) }}</h1>
    <ul class="ml-2 list-disc list-inside">
        @foreach ($list as $attendance)
            <li>{{ $attendance->user->username }}</li>
        @endforeach
    </ul>
</div>
