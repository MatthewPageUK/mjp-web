@props([
    'pr' => [],
    'closed' => false,
])
<li class="flex gap-4 bg-primary-900 rounded-lg p-2 pl-3 mb-1 items-center">

    <a class="flex-1" href="{{ $pr['html_url'] }}" target="_blank">
        #{{ $pr['number'] }}.
        <span @class(['line-through' => $closed])>
            {{ $pr['title'] }}
        </span>

    </a>
    <span class="text-xs text-primary-500">
        {{ \Carbon\Carbon::parse($closed ? $pr['closed_at'] : $pr['created_at'])->diffForHumans() }}
    </span>
</li>
