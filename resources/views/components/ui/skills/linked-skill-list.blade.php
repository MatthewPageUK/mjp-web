@props([
    'skills' => []
])

<span>
    @foreach ($skills as $skill)
        @php($seperator = $loop->last ? '' : ($loop->remaining === 1 ? ' and ' : ', '))
        <a
            href="{{ $skill->routeUrl }}"
            class="text-secondary-100 hover:text-secondary-400"
            title="View the {{ $skill->name }} skill page"
        >{{ $skill->name }}</a>{{ $seperator }}
    @endforeach
</span>
