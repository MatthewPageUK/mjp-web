<div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
    <span class="fi-ta-text-item-label text-xs leading-6 text-gray-950 dark:text-white">
        {{ $getRecord()->created_at?->diffForHumans() }}
    </span>
</div>