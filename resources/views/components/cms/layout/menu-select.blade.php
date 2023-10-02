@props([
    'route' => '',
    'items' => [],
    'title' => '',
])
<div class="flex items-center gap-1 relative">

    {{-- Drop down menu --}}
    <x-cms.form.select
        class="w-full hover:text-secondary-400 mr-1 hover:-ml-1 transition-all"
        x-data="{ link : '' }"
        x-model="link"
        x-init="$watch('link', value => window.location = link)"
    >
        <option value="{{ route($route) }}">{{ $title }}</option>

        @foreach ($items as $item)

            <option
                class="font-sans text-white"
                value="{{ route($route, ['mode' => 'update', 'id' => $item->id]) }}"
            >{{ $item->name }}</option>

        @endforeach

    </x-cms.form.select>

    {{-- Create --}}
    <x-cms.icon-button
        href="{{ route($route, ['mode' => 'create']) }}"
        title="Create a new {{ $title }}"
        icon="add_circle"
    />

    {{-- View --}}
    <x-cms.icon-button
        href="{{ route($route) }}"
        title="View {{ $title }}"
        icon="visibility"
    />

</div>
