{{-- Github Repo --}}
<x-cms.crud.field name="Github Repository">
    <livewire:cms.githubable :githubable="$this->model" wire:key="githubable-{{ $this->model->id }}" />
</x-cms.crud.field>
