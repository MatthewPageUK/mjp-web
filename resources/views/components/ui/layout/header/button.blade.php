{{-- A header button component --}}
@props([
    'href' => '#',
    'icon' => 'help',
    'tag' => 'help',
    'active' => false,
    'title' => '',
])
<div
    :class="page.startsWith('{{ $tag }}') ?
        'lg:odd:rotate-[-2deg] lg:even:rotate-[2deg] lg:z-[1000]' :
        ''
    "
>
    <a
        title="{{ $title }}"
        href="{{ $href }}"
        class="
            flex
            items-center
            lg:px-5 py-2
            ease-in-out duration-200
            relative

            text-primary-700

            rounded-none
            hover:text-white
            hover:bg-amber-400
            hover:border-t-blue-300
            hover:border-r-blue-300
            hover:border-b-blue-300
            hover:border-l-blue-300

            dark:px-5
            dark:rounded
            dark:text-primary-100
            dark:bg-primary-800
            dark:hover:text-secondary-400
            dark:hover:bg-primary-700
            dark:hover:border-t-primary-500
            dark:hover:border-r-primary-500
            dark:hover:border-b-primary-900
            dark:hover:border-l-primary-900
        "
        :class="page.startsWith('{{ $tag }}') ?
            'text-white bg-amber-400 dark:bg-primary-600 dark:text-secondary-400 px-8 dark:hover:bg-primary-600 shadow-lg' :
            'hover:shadow-lg dark:border border-t-primary-700 border-r-primary-700 border-b-primary-900 border-l-primary-900'
        "
    >
        <x-icons.material class="mr-2">{{ $icon }}</x-icons.material>
        <span class="font-semibold dark:font-light">
            {{ $slot }}
        </span>
    </a>
</div>