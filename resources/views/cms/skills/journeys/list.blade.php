{{-- Models list --}}
<ul class="mt-4"
    x-show="mode === 'read'"
>
    @foreach ($this->list as $model)
        <li class="group flex gap-4 pt-3 border-b pb-3 items-center text-primary-400 hover:text-white" wire:key="model-{{ $model->id }}">

            {{-- Name --}}
            <button wire:click.prevent="update({{ $model->id }})" class="flex-1 text-left">{{ $model->name }}</button>

            <span>{{ $model->completed_at }}</span>

            {{-- Buttons --}}
            <div class="flex gap-1 ml-4">

                {{-- Edit --}}
                <x-cms.icon-button icon="edit" wire:click.prevent="update({{ $model->id }})" title="Edit" />

                {{-- Delete --}}
                <x-cms.icon-button icon="delete" wire:click.prevent="confirmDelete({{ $model->id }})" title="Delete" />

            </div>
        </li>
    @endforeach
</ul>