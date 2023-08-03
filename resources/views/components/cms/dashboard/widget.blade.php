@props([
    'title' => 'Widget',
    'count' => 0,
])

<div class="sm:col-span-6 lg:col-span-3
    block border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600 overflow-hidden p-6
">
    <h2 class="flex items-center text-3xl text-amber-400">
        <span class="flex-1">{{ $title }}</span>
        <span class="text-sm border rounded-full px-2 py-1">{{ $count }}</span>
    </h2>

    {{ $slot }}

</div>