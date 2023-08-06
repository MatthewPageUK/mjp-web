@props(['paginator' => null])

@if ($paginator)

    @if ($paginator->hasPages())

        <div class="grid grid-cols-3 justify-items-center items-center text-sm">
            <button
                class="justify-self-start"
                wire:key="pagination-button-previous"
                wire:click.prevent="previousPage"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-slate-400 hover:fill-amber-400 rotate-180">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z" clip-rule="evenodd" />
                </svg>
            </button>
            <div>
                @for ($x = 1; $x <= $paginator->lastPage(); $x++)
                    <button wire:click.prevent="gotoPage({{ $x }})"
                        wire:loading.attr="disabled"
                        class="inline-block text-xs w-3 h-3 rounded-full {{ $x == $paginator->currentPage() ? 'bg-amber-400' : 'bg-slate-600' }} text-center"
                    >&nbsp;</button>
                @endfor
            </div>
            <button
                class="justify-self-end"
                wire:key="pagination-button-next"
                wire:click.prevent="nextPage"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-slate-400 hover:fill-amber-400">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

    @endif

@endif
