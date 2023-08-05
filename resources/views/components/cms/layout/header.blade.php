{{-- Mobile burger menu button / header --}}
<header class="fixed top-0 left-0 flex lg:hidden ease-in-out duration-500 p-4 w-full items-center bg-zinc-900">

    {{-- Logo --}}
    <a href="{{ route('cms.dashboard') }}" title="CMS Dashboard">
        <img src="/logo-chrome.png" class="w-24 h-auto" alt="">
    </a>

    {{-- Title --}}
    <h1 class="w-full uppercase text-amber-400 text-3xl font-black text-center">
        CMS
    </h1>

    {{-- Burger --}}
    <button
        x-on:click.prevent="toggle()"
        class="flex hover:text-amber-500 ease-in-out duration-500 items-center bg-zinc-900"
    >
        <x-icons.material class="text-4xl ml-1">menu</x-icons.material>
    </button>
</header>