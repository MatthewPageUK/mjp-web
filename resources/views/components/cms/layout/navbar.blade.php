@props([
    'menu' => []
])

{{-- Navbar menu --}}
<nav
    x-show="(isMobile && openMenu) || ! isMobile"
    class="md:w-[350px] font-orbitron bg-primary-900 shadow-lg p-8 mt-24 lg:mt-0"
>
    <div class="grid grid-cols-1 gap-4">
        {{-- Logo --}}
        <a href="{{ route('cms.dashboard') }}" title="CMS Dashboard" class="hidden lg:block">
            <img src="/logo-chrome.png" class="w-16 md:w-32 h-auto mx-auto" alt="">
        </a>

        {{-- Title --}}
        <h1 class="uppercase text-secondary-400 text-sm font-bold text-center mb-8 hidden lg:block">
            Content Management System
        </h1>

    </div>

    <ul class="grid grid-cols-1 gap-2">
        {{-- Dashboard --}}
        <li>
            <x-cms.layout.menu-link route="cms.dashboard" title="Dashboard" />
        </li>

        {{-- Bullet Points --}}
        <li>
            <x-cms.layout.menu-select route="cms.bullet-points" title="Bullet Points" :items="$menu['bullets']" />
        </li>

        {{-- Demos --}}
        <li>
            <x-cms.layout.menu-select route="cms.demos" title="Demos" :items="$menu['demos']" />
        </li>

        {{-- Posts --}}
        <li>
            <x-cms.layout.menu-select route="cms.posts" title="Posts" :items="$menu['posts']" />
        </li>

        {{-- Post Categories --}}
        <li>
            <x-cms.layout.menu-select route="cms.posts.categories" title="Post Categories" :items="$menu['postCategories']" />
        </li>

        {{-- Skills --}}
        <li>
            <x-cms.layout.menu-select route="cms.skills" title="Skills" :items="$menu['skills']" />
        </li>

        {{-- Skills Groups --}}
        <li>
            <x-cms.layout.menu-select route="cms.skills.groups" title="Skill Groups" :items="$menu['skillGroups']" />
        </li>

        {{-- Projects --}}
        <li>
            <x-cms.layout.menu-select route="cms.projects" title="Projects" :items="$menu['projects']" />
        </li>

        {{-- Experiences --}}
        <li>
            <x-cms.layout.menu-select route="cms.experiences" title="Experience" :items="$menu['experiences']" />
        </li>

        <li><x-cms.layout.menu-link route="cms.settings" title="Settings" /></li>

        {{-- User --}}
        <li class="mt-4 pt-4">
            <x-cms.layout.menu-link route="cms.dashboard" title="User Profile" />
        </li>

        {{-- Logout --}}
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="block text-left px-3 py-2 w-full bg-primary-800 border border-primary-700 rounded-lg bg-primary-800 hover:bg-primary-700 hover:border-primary-600 hover:-ml-1 transition-all">
                    Logout
                </button>
            </form>
        </li>

        {{-- Exit --}}
        <li>
            <x-cms.layout.menu-link route="home" title="Exit" />
        </li>
    </ul>
</nav>