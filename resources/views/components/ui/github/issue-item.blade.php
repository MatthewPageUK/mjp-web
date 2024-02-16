@props(['issue' => []])
@use('App\Enums\GithubIcon')

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
                <x-icons.material class="text-sm">{{ GithubIcon::Chat->value }}</x-icons.material>
            </a>
        @endif
        @foreach ($issue['labels'] as $label)
            <span style="background-color: #{{ $label['color'] }}" class="px-2 py-1 rounded-lg text-xs">{{ $label['name'] }}</span>
        @endforeach
    </div>

    {{-- Expand --}}
    <div>
        <button x-on:click.prevent="open = ! open ? {{ $issue['number'] }} : open !== {{ $issue['number']}} ? {{ $issue['number'] }} : false" class="flex items-center hover:text-secondary-400" title="View issue details">
            <x-icons.material x-show="open != {{ $issue['number'] }}" class="">expand_more</x-icons.material>
            <x-icons.material x-show="open == {{ $issue['number'] }}" class="">expand_less</x-icons.material>
        </button>
    </div>
</div>

{{-- Task Body --}}
<div x-show="open == {{ $issue['number'] }}">
    <div class="grid grid-cols-4 gap-8">
        <div class="col-span-4 prose-sm dark:prose-primary max-w-full p-4">
            @markdown($issue['body'] ?? '')
        </div>
    </div>
</div>