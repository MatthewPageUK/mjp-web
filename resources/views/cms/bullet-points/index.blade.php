{{--
    CMS - Bullet Points - Editor
--}}
<x-cms.layout.page>

    <div x-data="{
        mode: @entangle('modeName')
    }">

        {{-- Header --}}
        <x-cms.crud.header title="{{ $this->modelName }}s" />

        {{-- Session Messages --}}
        <x-cms.session-messages />

        {{-- Edit / create form --}}
        @include('cms.bullet-points.form')

        {{-- List --}}
        @include('cms.bullet-points.list')

        @if (count($this->list) < 1)
            {{-- No models - open the add form on render --}}
            <ul>
                <li class="text-2xl" wire:init="add">No {{ strtolower($this->modelName) }} found, create a new one.</li>
            </ul>
        @endif

        {{-- Delete confirmation form --}}
        <x-cms.crud.delete-form
            title="Delete {{ $this->modelName }} - {{ $this->model->name }}"
            question="Are you sure you want to delete this {{ strtolower($this->modelName) }}?"
        />

    </div>

</x-cms.layout.page>
