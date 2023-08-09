@props([
    'openRullRequests' => [],
    'closedRullRequests' => [],
])


<h1 class="text-4xl mb-2 flex gap-4 items-center">
    <x-icons.material class="text-3xl">compare_arrows</x-icons.material>
    Pull Requests
</h1>

<h1 class="text-sm font-orbitron mt-2 mb-2">Open</h1>
<div class="overflow-y-auto h-[200px] pr-2">
    <ul>
        @foreach ($openPullRequests as $pr)
            <li class="flex gap-4 bg-zinc-900 rounded-lg p-2 pl-3 mb-1 items-center">

                <a class="flex-1" href="{{ $pr['html_url'] }}" target="_blank">
                    #{{ $pr['number'] }}. {{ $pr['title'] }}
                </a>
                <span class="text-xs text-zinc-500">
                    {{ \Carbon\Carbon::parse($pr['created_at'])->diffForHumans() }}
                </span>
            </li>
        @endforeach
    </ul>
</div>

<h1 class="text-sm font-orbitron mt-8 mb-2">Closed</h1>
<div class="overflow-y-auto h-[300px] pr-2">
    <ul>
        @foreach ($closedPullRequests as $pr)

            <li class="flex gap-4 bg-zinc-900 rounded-lg p-2 pl-3 mb-1 items-center">

                <a class="flex-1" href="{{ $pr['html_url'] }}" target="_blank">
                    #{{ $pr['number'] }}. <span class="line-through">{{ $pr['title'] }}</span>
                </a>
                <span class="text-xs text-zinc-500">
                    {{ \Carbon\Carbon::parse($pr['closed_at'])->diffForHumans() }}
                </span>
            </li>
        @endforeach
    </ul>
</div>