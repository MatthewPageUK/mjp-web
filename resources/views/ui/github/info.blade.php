{{-- Github Repo Panel --}}
<section
    id="github-repo-info-panel"
    wire:init="loadRepo"
>

    {{-- Loading message --}}
    <x-ui.github.loading />

    @if ($this->error)
        {{-- Error message --}}
        <x-ui.github.loading-error />
    @else

        {{-- Main Panel --}}
        <div wire:loading.remove>

            <h2 class="font-orbitron font-black text-3xl mt-8 mb-2 first:mt-0">
                <a href="{{ $this->urlHome }}" class="flex items-center gap-3 hover:text-secondary-400 group transition" target="_blank" title="Codebase on Github">
                    <x-icons.github class="w-6 h-6 fill-primary-100 group-hover:fill-secondary-400 transition" />
                    Github Repository
                </a>
            </h2>

            <div class="pl-9">
                <ul class="grid grid-cols-2 gap-x-4 gap-y-2 text-sm items-center">
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
                    <li>Open Issues: {{ $this->openIssues }}</li>
                </ul>

                <div class="grid grid-cols-2 gap-2 mt-4">
                    <x-primary-button class="flex items-center gap-2 text-xs" href="{{ $this->urlHome }}" target="_blank" title="Codebase on Github.">
                        <x-icons.material class="text-lg">home_work</x-icons.material>
                        Home
                    </x-primary-button>

                    <x-primary-button class="flex items-center gap-2 text-xs" href="{{ $this->urlClone }}" target="_blank" title="Clone the code to your local environment.">
                        <x-icons.material class="text-lg">folder_copy</x-icons.material>
                        Clone
                    </x-primary-button>

                    <x-primary-button class="flex items-center gap-2 text-xs" href="{{ $this->links['new_bug'] }}" target="_blank" title="Report a bug or issue.">
                        <x-icons.material class="text-lg">bug_report</x-icons.material>
                        Bug report
                    </x-primary-button>

                    @if ($this->hasIssues)
                        <x-primary-button class="flex items-center gap-2 text-xs" href="{{ $this->links['issues'] }}" target="_blank" title="Fix an existing issue.">
                            <x-icons.material class="text-lg">build</x-icons.material>
                            Fix an issue
                        </x-primary-button>
                    @endif

                    <x-primary-button class="flex items-center gap-2 text-xs" href="{{ $this->links['new_enhancement'] }}" target="_blank" title="Suggest a new feature or enhancement.">
                        <x-icons.material class="text-lg">add_to_queue</x-icons.material>
                        Suggestions
                    </x-primary-button>

                    <x-primary-button class="flex items-center gap-2 text-xs" href="{{ $this->links['readme'] }}" target="_blank" title="Read the readme.md file.">
                        <x-icons.material class="text-lg">local_library</x-icons.material>
                        Read me
                    </x-primary-button>
                </div>
            </div>
        </div>
    @endif
</section>
