{{--
    UI - View Demo
--}}
<div>

    <div class="border-b pb-4 md:pb-8 mb-4">
        <h1 class="text-2xl md:text-5xl tracking-tight font-black flex items-center">
            <span class="flex-1">{{ $this->demo->name }}</span>
            <span class="hidden md:block material-icons-outlined text-6xl ml-1">smart_toy</span>
        </h1>
    </div>

    {{-- Embedded demo iframe --}}
    @if ($this->demo->demo_url)
        <iframe src="{{ $this->demo->demo_url }}" class="w-full h-[700px] mt-8 border border-2 border-primary-900 shadow-lg"></iframe>
    @else
        {{-- or Image --}}
        <img src="{{ $this->demo->image }}" class="w-full mt-8 border border-2 border-primary-900 shadow-lg" />
    @endif

    <div class="lg:grid lg:grid-cols-3 gap-x-16 my-16">

        <div class="col-span-2 space-y-8">

            {{-- Link to demo web site --}}
            @if ($this->demo->url)
                <x-ui.external-link href="{{ $this->demo->url }}" title="Demo Website" />
            @endif

            {{-- Demo description --}}
            <div class="prose prose-xl prose-primary">
                @markdown($this->demo->description)
            </div>

            {{-- Created --}}
            <p class="text-xs flex items-center gap-1">
                Created : <x-ui.badges.age :date="$this->demo->created_at" />
            </p>

        </div>

        <div class="">

            <x-related.links :model="$this->demo" />

        </div>

    </div>
</div>
