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
            showCount: 2,
        }"
        x-show="count > 0"
    >
        <h2 class="text-3xl mt-8 mb-2 first:mt-0">
            <a href="{{ route($relationship) }}">
                <span class="material-icons-outlined text-2xl font-normal ml-1">{{ $icon }}</span> {{ $title }}
            </a>
        </h1>
        <p class="pl-9">
            @foreach ($model->$relationship as $key => $link)
                <a class="block" x-show="expanded || {{ $key }} < 2" href="{{ route($section, [$section => $link]) }}">{{ $link->name }}</a>
            @endforeach
        </p>

        <p class="text-xs pl-9">
            <button
                class="border border-zinc-400 px-2 py-1 rounded mt-2 hover:text-amber-400"
                x-show="! expanded && count > showCount"
                x-on:click="expanded = true"
            >
                    Show <span x-text="count - showCount"></span> more
                <span class="material-icons-outlined text-xs">keyboard_arrow_down</span>
            </button>
            <button
                class="border border-zinc-400 px-2 py-1 rounded mt-2 hover:text-amber-400"
                x-show="expanded"
                x-on:click="expanded = false"
            >
                Show less
                <span class="material-icons-outlined text-xs">keyboard_arrow_up</span>
            </button>
        </p>
    </div>

@endif