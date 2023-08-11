<x-cms.layout.page>

    {{-- Header --}}
    <h1 class="text-4xl">Settings</h1>

    {{-- Session Messages --}}
    <x-cms.session-messages />

    <ul class="mt-16">
        @foreach ($this->settings as $setting)
            <li class="group flex gap-4 pt-3 border-b pb-3 items-center text-primary-400 hover:text-white" wire:key="setting-view-{{ $setting->id }}">

                {{-- Dot --}}
                <span @class([
                    'block w-4 h-4 mx-2 lg:group-hover:w-8 lg:group-hover:h-8 group-hover:rounded-full group-hover:mx-0 transition-all',
                    'bg-teal-400 lg:group-hover:bg-secondary-400',
                ])></span>

                {{-- Setting --}}
                <div class="flex-1">
                    <livewire:cms.setting-edit :setting="$setting" key="setting-{{ $setting->id }}" />
                </div>

            </li>
        @endforeach
    </ul>

</x-cms.layout.page>