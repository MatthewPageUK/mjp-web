<x-cms.crud.field name="{{ $label }}">
    <div x-data="{preview: false}">
        <p class="text-xs mb-2 px-2 grid grid-cols-2 items-center">
            <span class="font-semibold">Markdown content</span>
            <button x-on:click.prevent="preview = ! preview" x-text="preview ? 'Hide preview' : 'Show preview'" class="text-right text-secondary-400"></button>
        </p>
        <x-cms.form.textarea
            wire:model.live="model.{{ $field }}"
            class="h-96"
            x-data="{
                insertTab() {
                    var s = $el.selectionStart;
                    $el.value = $el.value.substring(0,$el.selectionStart) + '\t' + $el.value.substring($el.selectionEnd);
                    $el.selectionEnd = s+1;
                }
            }"
            @keydown.tab.prevent="insertTab"
        > </x-cms.form.textarea>
        <x-cms.validation-error field="model.{{ $field }}" />
        <div class="prose prose-primary prose-lg bg-primary-600 p-4 max-w-full rounded-lg" x-show="preview">
            @markdown($this->model->$field ?? '')
        </div>
    </div>
</x-cms.crud.field>
