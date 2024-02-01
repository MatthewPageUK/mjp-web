@php
    $relationship = $section . "s";
    $title = ucwords($relationship);
@endphp

@if (method_exists($model, $relationship) && $model->has($relationship))

    <div
        class="mb-8 last:mb-0"
        x-data="{
            count: {{ $model->$relationship->count() }},
            expanded: false,
            showCount: 5,
        }"
        x-show="count > 0"
    >
        <h2 class="XXfont-orbitron font-black text-3xl mt-8 mb-2 first:mt-0">
            <a href="{{ route($relationship) }}" class="hover:text-secondary-400 transition">
                <x-icons.material class="text-2xl font-normal ml-1">{{ $icon }}</x-icons.material>
                {{ $title }}
            </a>
        </h1>
        <p class="pl-9">
            @foreach ($model->$relationship as $key => $link)
                <a
                    class="block hover:text-secondary-400 transition"
                    x-show="expanded || {{ $key }} < showCount"
                    href="{{ $link->routeUrl }}"
                    title="{{ $link->name }}"
                >{{ $link->name }}</a>
            @endforeach
        </p>
        {{-- route($section, [$section => $link]) --}}

        <p class="text-xs pl-9 XXfont-orbitron">
            <x-primary-button
                class="px-2 py-1 rounded mt-2 hover:text-secondary-400"
                x-show="! expanded && count > showCount"
                x-on:click="expanded = true"
            >
                <span>Show <span x-text="count - showCount"></span> more</span>
                <x-icons.material class="text-xs">keyboard_arrow_down</x-icons.material>
            </x-primary-button>
            <x-primary-button
                class="px-2 py-1 rounded mt-2 hover:text-secondary-400"
                x-show="expanded"
                x-on:click="expanded = false"
            >
                <span>Show less</span>
                <x-icons.material class="text-xs">keyboard_arrow_up</x-icons.material>
            </x-primary-button>
        </p>
    </div>

@endif