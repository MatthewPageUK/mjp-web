{{-- Post Categories --}}
<x-cms.crud.field name="Categories">
    <livewire:cms.post-categoryable :post="$this->model" wire:key="postcategoryable-{{ $this->model->id }}" />
</x-cms.crud.field>
