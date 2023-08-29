@props(['issues' => []])

{{-- Tasks --}}

{{-- Header --}}
<h1 class="text-4xl mb-2 flex gap-4 items-center">
    <x-icons.material class="text-3xl">task</x-icons.material>
    Tasks
</h1>

{{-- Task List --}}
<div class="grid grid-cols-1 gap-2 overflow-y-scroll h-[590px] pr-2" x-data="{open: false}" >

    @php($lastAge = null)

    @foreach ($issues as $issue)

        {{-- Age sub heading --}}
        @if ($lastAge !== Carbon\Carbon::parse($issue['created_at'])->diffForHumans())
            <div class="text-sm text-right font-orbitron">
                {{ Carbon\Carbon::parse($issue['created_at'])->diffForHumans() }}
            </div>
            @php($lastAge = Carbon\Carbon::parse($issue['created_at'])->diffForHumans())
        @endif

        {{-- Task --}}
        <div class="bg-primary-900 rounded-lg p-2 pl-3">
            <x-ui.github.issue-item :issue="$issue" />
        </div>

    @endforeach

</div>
