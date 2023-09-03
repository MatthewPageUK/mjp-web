{{-- Projects --}}
<x-cms.crud.field name="Projects">
    <livewire:cms.projectable :projectable="$this->model" wire:key="projectable-{{ $this->model->id }}" />
</x-cms.crud.field>
