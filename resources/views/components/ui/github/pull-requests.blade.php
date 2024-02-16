@props([
    'openRullRequests' => [],
    'closedRullRequests' => [],
])
@use('App\Enums\GithubIcon')

<h1 class="text-4xl mb-2 flex gap-4 items-center">
    <x-icons.material class="text-3xl">{{ GithubIcon::PR->value }}</x-icons.material>
    Pull Requests
</h1>

<h1 class="text-sm mt-2 mb-2">Open</h1>
<div class="overflow-y-auto h-[200px] pr-2">
    <ul>
        @foreach ($openPullRequests as $pr)
            <x-ui.github.pull-request :pr="$pr" :closed="false" />
        @endforeach
    </ul>
</div>

<h1 class="text-sm mt-8 mb-2">Closed</h1>
<div class="overflow-y-auto h-[300px] pr-2">
    <ul>
        @foreach ($closedPullRequests as $pr)
            <x-ui.github.pull-request :pr="$pr" :closed="true" />
        @endforeach
    </ul>
</div>