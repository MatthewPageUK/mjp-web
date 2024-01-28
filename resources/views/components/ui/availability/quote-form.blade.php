<form class="grid grid-cols-12 gap-y-2 gap-x-2">

    @if ($this->mailError)
        <p class="text-xs text-red-500 col-span-12">Sorry, there was an error sending your quote request.</p>
    @endif

    @if ($this->sent)
        <p class="text-lg col-span-12">Thank you, your quote request has been sent.</p>
    @else

        {{-- Name --}}
        <div class="col-span-12 lg:col-span-4">Name</div>
        <div class="col-span-12 lg:col-span-8">
            <input
                wire:model.blur="messageName"
                @class([
                    'bg-primary-800 p-2 leading-tight rounded w-full',
                    'border border-red-500' => $errors->has('messageName')
                ])
                type="text"
            >
            <div class="text-xs text-red-500 mt-1">
                @error('messageName') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Email --}}
        <div class="col-span-12 lg:col-span-4">Email</div>
        <div class="col-span-12 lg:col-span-8">
            <input
                wire:model.blur="messageEmail"
                @class([
                    'bg-primary-800 p-2 leading-tight rounded w-full',
                    'border border-red-500' => $errors->has('messageEmail')
                ])
                type="text"
            >
            <div class="text-xs text-red-500 mt-1">
                @error('messageEmail') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Information --}}
        <div class="col-span-12 lg:col-span-12">Additional information</div>
        <div class="col-span-12 lg:col-span-12">
            <textarea
                wire:model.blur="messageContent"
                @class([
                    'bg-primary-800 p-2 leading-tight rounded w-full h-32',
                    'border border-red-500' => $errors->has('messageContent')
                ])
            ></textarea>
            <div class="text-xs text-red-500 mt-1">
                @error('messageContent') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Send / Cancel Buttons --}}
        <x-primary-button
            x-on:click.prevent="$wire.sendQuoteRequest(selectedDays)"
            class="col-span-12 lg:col-span-8 text-sm !bg-highlight-500 order-last"
        >
            Request quote
        </x-primary-button>

        <x-primary-button
            class="col-span-12 lg:col-span-4 text-sm"
            x-on:click.prevent="quoteOpen = false"
        >
            Cancel
        </x-primary-button>
    @endif
</form>
