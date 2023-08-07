
<form class="mt-8 bg-amber-400 p-8 rounded shadow-lg">

    @if ($this->mailError)
        <div class="min-h-[250px]">
            <div class="flex gap-2 items-center mb-2">
                <x-icons.material class="text-6xl text-zinc-800">error</x-icons.material>
                <h1 class="text-4xl font-bold text-zinc-800">Error sending mail...</h1>
            </div>
            <p class="text-zinc-700 mb-4 ml-16">Sorry {{ $this->message['first_name'] }}, there was an error sending your message. Please try again, or email me direct on XX@XXXX.com.</p>
            <p class="font-orbitron text-red-700 border border-red-700 border-2 p-2 text-xs font-semibold mb-8 ml-16">{{ $this->mailError }}</p>

        </div>
    @endif

    @if ($this->sent)
        <div class="min-h-[250px]">
            <div class="flex gap-4 items-center mb-8">
                <x-icons.material class="text-6xl text-zinc-800">forward_to_inbox</x-icons.material>
                <h1 class="text-4xl font-bold text-zinc-800 mb-2">Message sent...</h1>
            </div>
            <p class="text-zinc-700 mb-8">Thank you {{ $this->message['first_name'] }} for your interest, I will be in contact once I've had a chance to review your message.</p>
        </div>
    @else

        {{-- Sending --}}
        <div wire:loading wire:target="send" class="col-span-2"
            x-data="{
                count: 0,
                init() {
                    setInterval(() => {
                        this.count = this.count + 1;
                    }, 1000);
                },
            }"
            x-init="init()"
        >
            <div class="min-h-[250px]">
                <div class="flex gap-4 items-center mb-8">
                    <x-icons.material class="text-6xl text-zinc-800">forward_to_inbox</x-icons.material>
                    <h1 class="text-4xl font-bold text-zinc-800 mb-2">Sending mail
                        <template x-for="i in count" :key="i">
                            <span>.</span>
                        </template>
                    </h1>
                </div>
            </div>
        </div>

        <div wire:loading.remove wire:target="send">

            <div class="flex">
                <div class="flex-1">
                    <h1 class="text-4xl font-bold text-zinc-800 mb-2">Let's connect...</h1>
                    <p class="text-zinc-700 mb-8">Reach out with your ideas and thoughts and maybe together we can create something awesome.</p>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24 fill-amber-500 text-zinc-800">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                      </svg>

                </div>
            </div>

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



        <div wire:loading.remove wire:target="send" class="relative z-0 w-full mb-6 group">
            <textarea name="message.message" wire:model="message.message"
                class="font-gochi h-full block py-2.5 px-0 w-full text-2xl text-zinc-800 font-bold bg-transparent border-0 border-b-2 border-gray-800
                appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-zinc-600 peer" placeholder=" " required ></textarea>
            <label for="message.message" class="peer-focus:font-medium absolute text-sm text-zinc-800 dark:text-gray-400
                duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-zinc-600
                peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Your message</label>
        </div>

        <div  wire:loading.remove wire:target="send">
            <p class="text-zinc-900">
                <input type="checkbox"> Your email will only be used to contacting you about this message. It will not be added to any list or database.
            </p>

        </div>

        <div class="justify-self-end" wire:loading.remove wire:target="send">
            <button wire:click.prevent="send" class="
                flex items-center gap-2
                text-white bg-zinc-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-zinc-300 font-medium rounded-lg text-lg px-5 py-2.5
                text-center ">
                <x-icons.material>send</x-icons.material>
                Send message</button>
        </div>


        </div>
        <div>



    </div>

    @endif
</form>