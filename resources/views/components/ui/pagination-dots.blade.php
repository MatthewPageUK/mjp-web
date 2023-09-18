@props(['paginator' => null])

@if ($paginator)

    @if ($paginator->hasPages())

        <div class="grid grid-cols-3 justify-items-center items-center text-sm">
            <button
                @class([
                    'justify-self-start',
                    'opacity-30' => $paginator->currentPage() === 1,
                ])
                wire:key="pagination-button-previous"
                @if ($paginator->currentPage() !== 1)
                    wire:click.prevent="previousPage('{{ $paginator->getPageName() }}')"
                    title="Previous Page"
                @endif
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-primary-400 hover:fill-secondary-400 rotate-180">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z" clip-rule="evenodd" />
                </svg>
            </button>
            <div>
                @for ($x = 1; $x <= $paginator->lastPage(); $x++)
                    <button wire:click.prevent="gotoPage({{ $x }}, '{{ $paginator->getPageName() }}')"
                        wire:loading.attr="disabled"
                        @class([
                            'inline-block text-xs w-3 h-3 rounded-full text-center',
                            'bg-highlight-400' => $x == $paginator->currentPage(),
                            'bg-primary-600 hover:bg-secondary-400' => $x != $paginator->currentPage(),
                        ])
                        title="Go to page {{ $x }}"
                    >&nbsp;</button>
                @endfor
            </div>
            <button
                @class([
                    'justify-self-end',
                    'opacity-30' => $paginator->lastPage() === $paginator->currentPage(),
                ])
                wire:key="pagination-button-next"
                @if ($paginator->lastPage() !== $paginator->currentPage())
                    wire:click.prevent="nextPage('{{ $paginator->getPageName() }}')"
                    title="Next Page"
                @endif
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-primary-400 hover:fill-secondary-400">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

    @endif

@endif
