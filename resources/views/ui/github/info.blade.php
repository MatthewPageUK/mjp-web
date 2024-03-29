{{-- Github Repo Panel --}}
@use('App\Enums\GithubIcon')

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

            <h2 class="XXfont-black text-3xl mt-8 mb-4 first:mt-0">
                <a href="{{ $this->urlHome }}" class="flex items-center gap-3 hover:text-secondary-400 group XXtransition" target="_blank" title="Codebase on Github">
                    <x-icons.github class="w-6 h-6  fill-amber-700 dark:fill-primary-100 group-hover:fill-secondary-400 XXtransition" />
                    Github Repository
                </a>
            </h2>

            <div class="XXpl-9">
                <ul class="grid grid-cols-2 gap-x-4 gap-y-2 text-sm items-center">
                    {{-- Stars --}}
                    <li class="flex items-center gap-2">
                        <x-icons.material class="text-xl text-yellow-500">{{ GithubIcon::Star->value }}</x-icons.material>
                        <span class="text-xl">{{ $this->stars }} @choice('star|stars', $this->stars)</span>
                    </li>
                    {{-- Watchers --}}
                    <li class="flex items-center gap-2">
                        <x-icons.material class="text-xl text-green-400">{{ GithubIcon::Watch->value }}</x-icons.material>
                        <span class="text-xl">{{ $this->watchers }} @choice('watcher|watchers', $this->watchers)</span>
                    </li>
                    {{-- Dates --}}
                    <li class="text-sm flex items-center gap-1">
                        Created: <x-ui.badges.age :date="$this->created" />
                    </li>
                    <li class="text-sm flex items-center gap-1">
                        Updated: <x-ui.badges.age :date="$this->updated" />
                    </li>
                    <li class="text-sm flex items-center gap-1">
                        Pushed: <x-ui.badges.age :date="$this->pushed" />
                    </li>
                    <li class="text-sm flex items-center gap-1">Open Issues: {{ $this->openIssues }}</li>
                </ul>

                <div class="grid grid-cols-2 gap-2 mt-4">
                    <x-primary-button class="flex items-center gap-2 text-xs" href="{{ $this->urlHome }}" target="_blank" title="Codebase on Github.">
                        <x-icons.material class="text-lg">{{ GithubIcon::Home->value }}</x-icons.material>
                        Home
                    </x-primary-button>

                    <x-primary-button class="flex items-center gap-2 text-xs" href="{{ $this->urlClone }}" target="_blank" title="Clone the code to your local environment.">
                        <x-icons.material class="text-lg">{{ GithubIcon::Clone->value }}</x-icons.material>
                        Clone
                    </x-primary-button>

                    <x-primary-button class="flex items-center gap-2 text-xs" href="{{ $this->links['new_bug'] }}" target="_blank" title="Report a bug or issue.">
                        <x-icons.material class="text-lg">{{ GithubIcon::Bug->value }}</x-icons.material>
                        Bug report
                    </x-primary-button>

                    @if ($this->hasIssues)
                        <x-primary-button class="flex items-center gap-2 text-xs" href="{{ $this->links['issues'] }}" target="_blank" title="Fix an existing issue.">
                            <x-icons.material class="text-lg">{{ GithubIcon::Fix->value }}</x-icons.material>
                            Fix an issue
                        </x-primary-button>
                    @endif

                    <x-primary-button class="flex items-center gap-2 text-xs" href="{{ $this->links['new_enhancement'] }}" target="_blank" title="Suggest a new feature or enhancement.">
                        <x-icons.material class="text-lg">{{ GithubIcon::Suggestion->value }}</x-icons.material>
                        Suggestions
                    </x-primary-button>

                    <x-primary-button class="flex items-center gap-2 text-xs" href="{{ $this->links['readme'] }}" target="_blank" title="Read the readme.md file.">
                        <x-icons.material class="text-lg">{{ GithubIcon::Readme->value }}</x-icons.material>
                        Read me
                    </x-primary-button>
                </div>
            </div>
        </div>
    @endif
</section>
