<div>
    <form wire:submit="create">
        {{ $this->form }}

        <x-primary-button type="submit" class="mt-6 text-sm w-full btn btn-primary">Add Log</x-primary-button>
    </form>
    <x-filament-actions::modals />
</div>
