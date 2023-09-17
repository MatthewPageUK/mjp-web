{{-- Create / Edit form --}}
<x-cms.crud.form
    x-show="mode === 'create' || mode === 'update'"
    title="{{ ucwords($this->getMode()) }} {{ $this->modelName }}"
>

    {{-- Name and active status --}}
    <x-cms.crud.fields.name-active />

    {{-- Slug --}}
    <x-cms.crud.fields.slug />

    {{-- Snippet --}}
    <x-cms.crud.field name="Snippet">
        <x-cms.form.textarea wire:model="model.snippet" class="h-32" />
        <x-cms.validation-error field="model.snippet" />
    </x-cms.crud.field>

    {{-- Content (Markdown) --}}
    <x-cms.crud.fields.markdown label="Content" field="content" />

    @if ($this->modeName === 'update')

        {{-- Image --}}
        <x-cms.crud.fields.imageable />

        {{-- Post Categories --}}
        <x-cms.crud.fields.post-categoryable />

        {{-- Skills --}}
        <x-cms.crud.fields.skillable />

        {{-- Demos --}}
        <x-cms.crud.fields.demoable />

        {{-- Projects --}}
        <x-cms.crud.fields.projectable />

        {{-- Experiences --}}
        <x-cms.crud.fields.experienceable />

        {{-- Github Repo --}}
        <x-cms.crud.fields.githubable />

    @endif

    {{-- Buttons --}}
    <x-cms.crud.buttons-create />
    <x-cms.crud.buttons-update />

</x-cms.form.form>
