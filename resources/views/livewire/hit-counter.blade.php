{{-- Hit Counter Component --}}
<div
    x-data="{
        counterFormat: $persist(@entangle('format')),
        expanded: false,
    }"
    x-on:mouseover="expanded = true"
    x-on:mouseleave="expanded = false"
    class="grid grid-cols-12 w-[500px] gap-1"
>
    <div class="col-span-6 p-1 border-2 rounded-sm text-center border-zinc-700 bg-zinc-900 text-emerald-600">
        {{-- Title --}}
        <span class="block text-xs">
            {{ __('Hit counter') }}
        </span>

        {{-- The Counter --}}
        <span @class([
            'text-xl tracking-widest mt-16',
            'font-adamina' => $this->format === 'rom',
            'font-orbitron' => $this->format !== 'rom',
        ])>
            {{ $this->counter }}
        </span>
    </div>

    {{-- Hidden Panel --}}
    <div
        x-cloak
        x-show="expanded"
        x-transition.scale.origin.left.duration.500ms
        class="col-span-6 grid grid-cols-2 p-1 border-2 rounded-sm text-center border-zinc-700 bg-zinc-900 text-emerald-600 text-xs"
    >
        {{-- Stats --}}
        <div class="grid grid-cols-1 items-center text-center ml-1 mr-2 border-r-2 border-zinc-700">
            <div>{{ $this->days }} {{ __('days') }}</div>
            <div>{{ $this->hitsPerDay }} {{ __('hits p/day') }}</div>
        </div>

        {{-- Formats --}}
        <div class="grid grid-cols-2">
            @foreach ($this->formats as $name => $format)
                <button
                    @class([
                        'px-1 uppercase',
                        'hover:text-amber-500' => $this->format !== $format,
                        'bg-emerald-600 text-zinc-900' => $this->format === $format,
                    ])
                    wire:click.prevent="setFormat('{{ $format }}')"
                    wire:key="hit-counter-format-{{ $format }}"
                >{{ $name }}</button>
            @endforeach
        </div>
    </div>
</div>