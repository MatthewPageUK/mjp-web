{{--
    CMS - Experiences - Editor
--}}
<x-cms.layout.page>

    <div x-data="{
        mode: @entangle('modeName').live
    }">

        {{-- Header --}}
        <x-cms.crud.header title="{{ Str::plural($this->modelName) }}" />

        {{-- Session Messages --}}
        <x-cms.session-messages />

        {{-- Edit / create form --}}
        @include('cms.experiences.form')

        {{-- Delete confirmation form --}}
        <x-cms.crud.delete-form
            title="Delete {{ $this->modelName }} - {{ $this->model->name }}"
            question="Are you sure you want to delete this {{ strtolower($this->modelName) }}?"
        />

        {{-- List --}}
        @include('cms.experiences.list')

        @if (count($this->list) < 1)
            {{-- No models - open the add form on render --}}
            <ul>
                <li class="text-2xl" wire:init="add">No {{ strtolower($this->modelName) }} found, create a new one.</li>
            </ul>
        @endif

    </div>

</x-cms.layout.page>
