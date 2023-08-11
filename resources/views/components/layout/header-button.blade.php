{{-- A header button component --}}
@props([
    'href' => '#',
    'icon' => 'help',
    'tag' => 'help',
    'active' => false,
])
<div>
    <a
        href="{{ $href }}"
        class="
            flex items-center
            rounded px-6 py-2
            ease-in-out duration-500
            border border-t-primary-700 border-r-primary-700 border-b-primary-900 border-l-primary-900
            hover:text-secondary-400
            hover:bg-primary-700
            hover:border-t-primary-500 hover:border-r-primary-500 hover:border-b-primary-900 hover:border-l-primary-900
        "
        :class="page.startsWith('{{ $tag }}') && 'text-secondary-400 border-2 border-t-0 border-l-0 border-r-0 border-b-secondary-400 rounded-none text-secondary-400 px-8 border-none hover:bg-primary-800'"
    >
        <x-icons.material class="mr-2">{{ $icon }}</x-icons.material>
        <span class="font-bold">
            {{ $slot }}
        </span>
    </a>
</div>