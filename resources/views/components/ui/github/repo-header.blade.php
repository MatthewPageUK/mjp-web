@use('App\Enums\GithubIcon')
<header class="md:flex mb-4 border-b pb-4">
    <h1 class="flex-1 text-2xl md:text-4xl flex gap-4 items-center font-orbitron">
        <x-icons.github class="w-8 h-8 fill-secondary-400" />
        Project Development
    </h1>
    <div class="flex gap-2">
        <x-primary-button class="text-xs !py-1 !px-2" href="{{ $this->urlHome }}" target="_blank" title="Codebase on Github.">
            <x-icons.material class="text-sm mr-1">{{ GithubIcon::Home->value }}</x-icons.material>
            Home
        </x-primary-button>

        <x-primary-button class="text-xs !py-1 !px-2" href="{{ $this->urlClone }}" target="_blank" title="Clone the code to your local environment.">
            <x-icons.material class="text-sm mr-1">{{ GithubIcon::Clone->value }}</x-icons.material>
            Clone
        </x-primary-button>

        <x-primary-button class="text-xs !py-1 !px-2" href="{{ $this->links['new_bug'] }}" target="_blank" title="Report a bug or issue.">
            <x-icons.material class="text-sm mr-1">{{ GithubIcon::Bug->value }}</x-icons.material>
            Bug report
        </x-primary-button>

        @if ($this->hasIssues)
            <x-primary-button class="text-xs !py-1 !px-2" href="{{ $this->links['issues'] }}" target="_blank" title="Fix an existing issue.">
                <x-icons.material class="text-sm mr-1">{{ GithubIcon::Fix->value }}</x-icons.material>
                Fix an issue
            </x-primary-button>
        @endif

        <x-primary-button class="text-xs !py-1 !px-2" href="{{ $this->links['new_enhancement'] }}" target="_blank" title="Suggest a new feature or enhancement.">
            <x-icons.material class="text-sm mr-1">{{ GithubIcon::Suggestion->value }}</x-icons.material>
            Suggestions
        </x-primary-button>

        <x-primary-button class="text-xs !py-1 !px-2" href="{{ $this->links['readme'] }}" target="_blank" title="Read the readme.md file.">
            <x-icons.material class="text-sm mr-1">{{ GithubIcon::Readme->value }}</x-icons.material>
            Read me
        </x-primary-button>
    </div>
</header>
