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
    <a href="{{ route($route, ['mode' => 'create']) }}" class="leading-none hover:text-secondary-400 transition-all" title="Create a new {{ $title }}">
        <x-icons.material >add_circle</x-icons.material>
    </a>

    {{-- View --}}
    <a href="{{ route($route) }}" class="leading-none hover:text-secondary-400 transition-all" title="View {{ $title }}">
        <x-icons.material >visibility</x-icons.material>
    </a>
</div>
