{{-- Selectable relationship --}}
<div
    class="border border-primary-700 bg-primary-900 rounded-lg p-4"
    x-data="{ open: false }"
>
    <ul>
        {{ $selected }}
        <li class="flex items-center gap-2">
            <span class="flex-1"></span>
            <x-cms.icon-button
                x-show="! open"
                @click.prevent="open = ! open"
                iconClass=""
                icon="add_circle"
                title="Add"
            />
            <x-cms.icon-button
                x-show="open"
                @click.prevent="open = ! open"
                iconClass=""
                icon="expand_less"
                title="Show less"
            />
        </li>
    </ul>

    <div x-show="open">
        <x-cms.form.input class="text-sm" wire:model.live="filter" placeholder="Search..." />
        <ul class="mt-2">
            {{ $selectable }}
        </ul>
    </div>
</div>