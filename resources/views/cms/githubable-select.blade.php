{{-- Githubable editable URL --}}
<div>
    <div>
        <div class="flex gap-2 items-start">
            <div class="flex-1">
                <x-cms.form.input wire:model="url" class="flex-1" placeholder="Full URL of repository"/>
                <x-cms.validation-error field="url" />

                <x-cms.form.input wire:model="owner" class="flex-1" placeholder="Repository Owner"/>
                <x-cms.validation-error field="owner" />

                <x-cms.form.input wire:model="name" class="flex-1" placeholder="Repository Name"/>
                <x-cms.validation-error field="name" />
            </div>

            @if ($this->githubable->githubRepo?->exists())
                <x-cms.icon-button
                    wire:click.prevent="remove()"
                    iconClass=""
                    icon="cancel"
                    title="Remove Github repository"
                />
            @endif
        </div>
    </div>
</div>
