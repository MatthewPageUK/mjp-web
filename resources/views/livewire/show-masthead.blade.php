<div>
    @if ($this->masthead)
        <section
            @class([
                'relative min-h-[256px] bg-black text-white',
                'hidden md:block' => $this->masthead->hide_on_mobile,
            ])
        >
            {{-- Content iframe --}}
            <iframe
                src="{{ $this->masthead->url }}"
                class="w-full min-h-[256px]"
                scrolling="no"
            ></iframe>

            {{-- Name and tagline --}}
            <p class="flex items-center px-4 py-2 text-xs text-green-400">
                <span class="flex-1">
                    <span class="font-bold">{{ $this->masthead->name }}</span>
                    <span class="italic"> - {{ $this->masthead->tagline }}</span>
                </span>

                @if ($this->masthead->more_url)
                    {{-- More info link --}}
                    <span class="justify-self-end text-right">
                        <a href="{{ $this->masthead->more_url }}"
                            class="flex items-center text-xs text-green-400 hover:text-amber-400 ease-in-out duration-500"
                        >
                            {{ __('More info') }}
                            <span class="material-icons-outlined text-sm ml-1 hover:fill-amber-400">help</span>
                        </a>
                    </span>
                @endif
            </p>

            {{-- Next button --}}
            <button
                class="absolute rounded-full top-4 right-4 bg-zinc-800 h-8 w-8 hover:bg-amber-400 ease-in-out duration-500"
                title="Next demo"
                wire:click="next"
            >{{ __('>') }}</button>

        </section>
    @endif
</div>
