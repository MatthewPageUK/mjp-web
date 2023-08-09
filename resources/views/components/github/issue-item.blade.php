@props(['issue' => []])

<div class="flex items-center">

    {{-- Number / Title --}}
    <a class="flex-1 text-lg font-semibold" target="_blank" href="{{ $issue['html_url'] }}">
        #{{ $issue['number'] }}. {{ $issue['title'] }}
    </a>

    {{-- Labels --}}
    <div class="flex gap-1">
        @if ($issue['comments'] > 0)
            <a href="{{ $issue['html_url'] }}" target="_blank" class="text-xs flex items-center gap-1 mr-1" title="Active discussion">
                {{ $issue['comments'] }}
                <x-icons.material class="text-sm">forum</x-icons.material>
            </a>
        @endif
        @foreach ($issue['labels'] as $label)
            <span style="background-color: #{{ $label['color'] }}" class="px-2 py-1 rounded-lg text-xs">{{ $label['name'] }}</span>
        @endforeach
    </div>

    {{-- Expand --}}
    <div>
        <button x-on:click.prevent="open = ! open ? {{ $issue['number'] }} : open !== {{ $issue['number']}} ? {{ $issue['number'] }} : false" class="flex items-center hover:text-amber-400" title="View issue details">
            <span x-show="open != {{ $issue['number'] }}" class="material-icons-outlined">expand_more</span>
            <span x-show="open == {{ $issue['number'] }}" class="material-icons-outlined">expand_less</span>
        </button>
    </div>
</div>

{{-- Task Body --}}
<div x-show="open == {{ $issue['number'] }}">
    <div class="grid grid-cols-4 gap-8">
        <div class="col-span-4 prose prose-zinc p-4">
            @markdown($issue['body'] ?? '')
        </div>
    </div>
</div>