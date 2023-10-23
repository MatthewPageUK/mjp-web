{{-- UI Contact Form --}}
<form class="pt-8 bg-primary-700 p-8 rounded shadow-lg" id="contact-form">

    @if ($this->mailError)
        {{-- Send Error --}}
        <div class="min-h-[250px]">
            <div class="flex gap-2 items-center mb-2">
                <x-icons.material class="text-6xl text-primary-300">error</x-icons.material>
                <h1 class="text-4xl font-bold text-primary-300">Error sending mail...</h1>
            </div>
            <p class="text-primary-700 mb-4 ml-16">
                Sorry {{ $this->message['first_name'] }}, there was an error sending your message. Please try again, or email me direct on
                <a href="mailto:{{ Settings::getValue('contact_email') }}" class="text-primary-800 font-bold hover:text-primary-600">
                    {{ Settings::getValue('contact_email') }}
                </a>.
            </p>
            <p class="font-orbitron text-red-700 border border-red-700 border-2 p-2 text-xs font-semibold mb-8 ml-16">{{ $this->mailError }}</p>
        </div>
    @endif

    @if ($this->sent)
        {{-- Sent --}}
        <div class="min-h-[250px]">
            <div class="flex gap-4 items-center mb-8">
                <x-icons.material class="text-6xl text-primary-300">forward_to_inbox</x-icons.material>
                <h1 class="text-4xl font-bold text-primary-300 mb-2">Message sent...</h1>
            </div>
            <p class="text-primary-300 mb-8">Thank you {{ $this->message['first_name'] }} for your interest, I will be in contact once I've had a chance to review your message.</p>
        </div>
    @else

        {{-- Sending --}}
        <div wire:loading.delay.long wire:target="send" class="col-span-2">
            <div class="min-h-[250px]">
                <div class="flex gap-4 items-center mb-8">
                    <x-icons.material class="text-6xl text-primary-300 animate-bounce">forward_to_inbox</x-icons.material>
                    <h1 class="text-4xl font-bold text-primary-300 mb-2">Sending mail</h1>
                </div>
            </div>
        </div>

        <div
            class="gap-6"
            wire:loading.remove
            wire:target="send"
            x-data="{ agree: false }"
        >
            <div class="flex">
                <div class="flex-1">
                    <h1 class="leading-7 text-4xl font-bold text-primary-200 mb-2">Get in touch...</h1>
                    <p class="text-primary-400 mb-2">Reach out with your ideas and thoughts and together we can create something awesome.</p>
                    <p class="text-primary-400 mb-8">
                        Please use the form below or email me direct on
                        <a href="mailto:{{ Settings::getValue('contact_email') }}" class="text-secondary-400 hover:text-secondary-600">
                            {{ Settings::getValue('contact_email') }}
                        </a>
                    </p>
                </div>
                <div>
                    <x-icons.contact class="w-12 h-12 md:w-24 md:h-24 fill-none text-primary-200" />
                </div>
            </div>

            {{-- Form --}}
            <div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <x-ui.contact.text-input name="message.first_name" label="First Name" />
                    <x-ui.contact.text-input name="message.surname" label="Surname" />
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <x-ui.contact.text-input name="message.company" label="Company" />
                    <x-ui.contact.text-input name="message.telephone" label="Telephone" />
                </div>
                <div class="grid md:grid-cols-1 md:gap-6">
                    <x-ui.contact.text-input name="message.email" label="Email" />
                </div>
            </div>

            <div class="relative z-0 w-full mb-6 group">
                <textarea
                    name="message.message"
                    wire:model.blur="message.message"
                    class="font-gochi h-32 block py-2.5 px-0 w-full text-2xl text-primary-100 font-bold bg-transparent border-0 border-b-2 border-primary-800 appearance-none focus:outline-none focus:ring-0 focus:border-primary-600 peer
                        @error('message.message') border-red-500 @enderror"
                    placeholder=" "
                    required
                ></textarea>
                <label
                    for="message.message"
                    class="peer-focus:font-medium absolute text-sm text-primary-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                >Your message</label>
            </div>

            {{-- Agree --}}
            <p class="text-primary-300 text-xs mb-6">
                <input id="agree" type="checkbox" x-model="agree" class="focus:bg-highlight-500 hover:checked:bg-highlight-500 checked:bg-highlight-500 mr-1">
                <label for="agree">I agree to my email address being used in regards to this communication only.</label>
            </p>

            {{-- Send Button --}}
            <div class="justify-self-end" wire:loading.remove wire:target="send">
                <button
                    x-bind:disabled="!agree"
                    wire:click.prevent="send"
                    class="disabled:opacity-30 flex items-center gap-2 text-white bg-primary-900 disabled:hover:bg-primary-900 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center"
                >
                    <x-icons.material>send</x-icons.material>
                    Send message
                </button>
            </div>

        </div>
    @endif
</form>
