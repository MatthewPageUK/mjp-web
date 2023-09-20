{{-- Create / Update form --}}
<x-cms.crud.form
    x-show="mode === 'create' || mode === 'update'"
    title="{{ ucwords($this->getMode()) }} {{ $this->modelName }}"
>

    {{-- Name and active status --}}
    <x-cms.crud.fields.name-active />

    {{-- Slug --}}
    <x-cms.crud.fields.slug />

    {{-- Description (Markdown) --}}
    <x-cms.crud.fields.markdown label="Description" field="description" />

    {{-- Level --}}
    <x-cms.crud.field name="Level">
        <x-cms.validation-error field="model.level" />
        <input class="accent-secondary-400 w-1/2 h-3 bg-primary-900 rounded-lg cursor-pointer range-lg" type="range" min="1" max="10" step="1" wire:model="model.level">
        <span class="ml-2 text-2xl font-black">{{ $this->model->level }}</span>
    </x-cms.crud.field>

    {{-- SVG --}}
    <x-cms.crud.field name="SVG">
        <div class="flex gap-4">
            <x-cms.form.textarea wire:model="model.svg" class="h-16 text-sm focus:h-64" />
            <div class="w-32 h-32">{!! $this->model->svg !!}</div>
        </div>
        <x-cms.validation-error field="model.svg" />
    </x-cms.crud.field>


    @if ($this->modeName === 'update')

        {{-- Skill Journeys --}}
        <x-cms.crud.field name="Skill Journey">
            <livewire:cms.skill-journeys-editor :skill="$this->model"/>
        </x-cms.crud.field>

        {{-- Image --}}
        <x-cms.crud.fields.imageable />

        {{-- Skills Groups --}}
        <x-cms.crud.fields.skill-groupable />

        {{-- Demos --}}
        <x-cms.crud.fields.demoable />

        {{-- Projects --}}
        <x-cms.crud.fields.projectable />

        {{-- Experiences --}}
        <x-cms.crud.fields.experienceable />

        {{-- Posts --}}
        <x-cms.crud.fields.postable />

    @endif

    {{-- Buttons --}}
    <x-cms.crud.buttons-create />
    <x-cms.crud.buttons-update />

</x-cms.form.form>