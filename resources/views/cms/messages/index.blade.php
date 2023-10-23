<x-cms.layout.page>

    <div x-data="{
        mode: @entangle('modeName')
    }">

        {{-- Header --}}
        <h1 class="text-4xl">Messages</h1>

        {{-- Session Messages --}}
        <x-cms.session-messages />

        {{-- Delete confirmation form --}}
        <x-cms.crud.delete-form
            title="Delete message?"
            question="Are you sure you want to delete this message?"
        />

        <ul class="mt-16">
            @foreach ($this->messages as $model)
                <li class="group flex gap-4 py-6 border-b items-center text-primary-400 hover:text-white">

                    {{-- Dot --}}
                    <span @class([
                        'block w-4 h-4 mx-2 lg:group-hover:w-8 lg:group-hover:h-8 group-hover:rounded-full group-hover:mx-0 transition-all',
                        'bg-teal-400 lg:group-hover:bg-secondary-400',
                    ])></span>

                    {{-- Message --}}
                    <div class="flex-1 space-y-4">
                        <div class="flex gap-4 font-semibold">
                            <p>From : {{ $model->first_name }} {{ $model->surname }}
                                &laquo;<a class="hover:text-secondary-600" href="mailto:{{ $model->email }}">
                                    {{ $model->email }}
                                </a>&raquo;
                            </p>
                            <p class="flex-1 text-right">{{ $model->created_at }}</p>
                            <p>{{ \Carbon\Carbon::parse($model->created_at)->diffForHumans() }}</p>
                        </div>
                        <p>{{ $model->message }}</p>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex gap-1 ml-4">

                        {{-- Delete --}}
                        <x-cms.icon-button icon="delete" wire:click.prevent="confirmDelete({{ $model->id }})" title="Delete" />

                    </div>

                </li>
            @endforeach
        </ul>

    </div>

</x-cms.layout.page>