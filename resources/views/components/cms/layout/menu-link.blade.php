@props([
    'route' => '',
    'title' => '',
])

<a
    class="block px-3 py-2 w-full bg-zinc-800 border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600 hover:-ml-1 transition-all"
    href="{{ route($route) }}"
>{{ $title }}</a>