{{-- SiteSetting view - shows value and input fields for editing --}}
<div>

    {{-- Setting Name --}}
    <div class="w-full text-2xl font-semibold">
        {{ $this->setting->getLabel() }}
    </div>

    <div class="flex justify-between items-center">

        <!-- Left -->
        <div class="grow mr-2">
            <div class="text-sm">
                @switch($this->mode)

                    {{-- Edit setting --}}
                    @case('edit')

                        @switch($this->setting->type)

                            @case('text')
                                <x-cms.form.textarea id="value" name="value" class="h-[500px]" value="{{ $this->setting->getValue() }}"
                                    wire:model.blur="value"
                                />
                            @break

                            @default
                                <x-cms.form.input id="value" name="value" value="{{ $this->setting->getValue() }}"
                                    wire:model.blur="value"
                                />
                        @endswitch
                    @break

                    {{-- View setting --}}
                    @default
                        {{-- <div class="mt-2 flex content-center"> --}}
                            {{-- URL icon and link --}}
                            {{-- @if(filter_var($this->setting->getValue(), FILTER_VALIDATE_URL))
                                <span>
                                    <a href="{{ $this->setting->getValue() }}" target="_blank">
                                        <x-icons.material class="mr-1 text-sm">open_in_new</x-icons-material>
                                    </a>
                                </span>
                            @endif --}}

                            {{-- Email address icon and link --}}
                            {{-- @if(filter_var($this->setting->getValue(), FILTER_VALIDATE_EMAIL))
                                <span>
                                    <a href="mailto:{{ $this->setting->getValue() }}" target="_blank">
                                        <x-icons.material class="mr-1 text-sm">mail</x-icons-material>
                                    </a>
                                </span>
                            @endif --}}

                            {{-- Setting value --}}
                            {{-- <span>{{ $this->setting->getValue() }}</span> --}}
                        {{-- </div> --}}
                @endswitch
            </div>
        </div>
        <!-- Right -->
        <div class="shrink flex ml-2 gap-x-2">
            @switch($this->mode)

                @case('edit')
                    {{-- Cancel Button --}}
                    <x-cms.button
                        wire:key="setting-button-cancel"
                        class="flex items-center gap-1"
                        title="Cancel editing"
                        wire:click="cancel"
                    >
                        <x-icons.material>cancel</x-icons.material>
                        {{ __('Cancel') }}
                    </x-cms.button>

                    {{-- Save Button --}}
                    <x-cms.button
                        wire:key="setting-button-save"
                        class="opacity-50 flex items-center gap-1"
                        title="Save changes"
                        wire:click="save"
                        wire:dirty.class.remove="opacity-50"
                        wire:target="value"
                    >
                        <x-icons.material>save</x-icons.material>
                        {{ __('Save') }}
                    </x-cms.button>
                @break

                @default
                    <x-cms.icon-button icon="edit" wire:click.prevent="edit" title="Edit" />

            @endswitch
        </div>
    </div>
</div>
