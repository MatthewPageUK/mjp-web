{{-- Github Repo Panel --}}
<section class="mb-16 pb-8 border-b"  wire:init="loadRepo">

    {{-- Loading message --}}
    <div wire:loading>
        <div class="w-full bg-green-500 text-white p-4 rounded-lg flex gap-2 items-center">
            <x-icons.material class="text-4xl">sync</x-icons.material>
            Loading data from Github...
        </div>
    </div>

    {{-- Error message --}}
    @if ($this->error)
        <div class="w-full bg-red-500 text-white p-4 rounded-lg flex gap-2 items-center">
            <x-icons.material class="text-4xl">sync_problem</x-icons.material>
            {{ $this->error }}
        </div>
    @else

        {{-- Main Panel --}}
        <div wire:loading.remove>

            {{-- Header --}}
            <header class="flex mb-4 border-b pb-4">
                <h1 class="flex-1 text-4xl flex gap-4 items-center font-orbitron">
                    <x-icons.github class="w-8 h-8 fill-secondary-400" />
                    Project Development
                </h1>
                <div class="flex gap-2">
                    <x-primary-button class="bg-green-400 text-sm" href="{{ $this->urlClone }}" target="_blank">
                        <span class="material-icons-outlined mr-1">folder_copy</span>
                        Clone
                    </x-primary-button>

                    <x-primary-button class="text-sm" href="{{ $this->urlHome }}" target="_blank">
                        <span class="material-icons-outlined mr-1">home_work</span>
                        Code Home
                    </x-primary-button>
                </div>
            </header>

            {{-- Repo Info --}}
            <ul class="grid grid-cols-5 gap-4 text-sm items-center">
                {{-- Stars --}}
                <li class="flex items-center gap-2">
                    <x-icons.material class="text-xl text-yellow-500">star</x-icons.material>
                    <span class="text-xl">{{ $this->stars }} @choice('star|stars', $this->stars)</span>
                </li>
                {{-- Watchers --}}
                <li class="flex items-center gap-2">
                    <x-icons.material class="text-xl text-green-400">visibility</x-icons.material>
                    <span class="text-xl">{{ $this->watchers }} @choice('watcher|watchers', $this->watchers)</span>
                </li>
                {{-- Dates --}}
                <li>Created: {{ $this->created }}</li>
                <li>Updated: {{ $this->updated }}</li>
                <li>Pushed: {{ $this->pushed }}</li>
            </ul>

            {{-- Issues and Pull Requests --}}
            <div class="grid grid-cols-3 gap-16 mt-8">
                <div class="col-span-2">
                    {{-- Issues --}}
                    <x-github.issues :issues="$this->issues" />
                </div>

                <div>
                    {{-- Pull requests --}}
                    <x-github.pull-requests
                        :open-pull-requests="$this->openPullRequests"
                        :closed-pull-requests="$this->closedPullRequests"
                    />
                </div>
            </div>

        </div>
    @endif
</section>
