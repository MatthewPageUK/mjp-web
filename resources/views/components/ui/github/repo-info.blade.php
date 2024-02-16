@use('App\Enums\GithubIcon')

<ul class="grid grid-cols-5 gap-4 text-sm items-center">
    {{-- Stars --}}
    <li class="flex items-center gap-2">
        <x-icons.material class="text-xl text-yellow-600 dark:text-yellow-500">{{ GithubIcon::Star->value }}</x-icons.material>
        <span class="text-xl">{{ $this->stars }} @choice('star|stars', $this->stars)</span>
    </li>
    {{-- Watchers --}}
    <li class="flex items-center gap-2">
        <x-icons.material class="text-xl text-green-600 dark:text-green-400">{{ GithubIcon::Watch->value }}</x-icons.material>
        <span class="text-xl">{{ $this->watchers }} @choice('watcher|watchers', $this->watchers)</span>
    </li>
    {{-- Dates --}}
    <li>Created: {{ $this->created }}</li>
    <li>Updated: {{ $this->updated }}</li>
    <li>Pushed: {{ $this->pushed }}</li>
</ul>
