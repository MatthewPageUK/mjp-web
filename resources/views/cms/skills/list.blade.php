{{-- Models list --}}
<ul class="mt-16"
    x-show="mode === 'read'"
>
    @foreach ($this->list as $model)
        <li class="group flex gap-4 pt-3 border-b pb-3 items-center text-primary-400 hover:text-white" wire:key="model-{{ $model->id }}">

            {{-- Dot --}}
            {{-- <span @class([
                'block w-6 h-6 rounded-full lg:group-hover:h-2 transition-all',
                'bg-emerald-400 lg:group-hover:bg-secondary-400' => $model->active === 1,
                'bg-primary-400' => $model->active === 0,
            ])></span> --}}
            {{-- Level --}}
            <span @class([
                    'flex items-center justify-center text-white font-bold font-orbitron w-8 h-8 rounded-full group-hover:w-16 group-hover:h-6 group-hover:shadow-lg group-hover:rounded-sm transition-all',
                    'bg-primary-400' => ! $model->active,
                    'bg-red-400' => $model->active && $model->level < 3,
                    'bg-secondary-400' => $model->active && $model->level < 7 && $model->level >= 3,
                    'bg-green-400' => $model->active && $model->level >= 7,
                ])
            >
                {{ $model->level }}
            </span>

            {{-- Name --}}
            <button wire:click.prevent="update({{ $model->id }})" class="flex-1 text-left lg:text-2xl">{{ $model->name }}</button>

            {{-- Group(s) --}}
            <div class="hidden md:block">
                <span class="text-sm">{{ $model->skillGroups->implode('name', ', ') }}</span>
            </div>

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