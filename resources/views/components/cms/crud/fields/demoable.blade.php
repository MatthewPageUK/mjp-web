{{-- Demos --}}
<x-cms.crud.field name="Demos">
    <livewire:cms.demoable :demoable="$this->model" wire:key="demoable-{{ $this->model->id }}" />
</x-cms.crud.field>
