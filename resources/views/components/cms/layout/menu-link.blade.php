@props([
    'route' => '',
    'title' => '',
])

<a
    class="block px-3 py-2 w-full bg-primary-800 border border-primary-700 rounded-lg bg-primary-800 hover:bg-primary-700 hover:border-primary-600 hover:-ml-1 transition-all"
    href="{{ route($route) }}"
>{{ $title }}</a>