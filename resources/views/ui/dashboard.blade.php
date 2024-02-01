
<div class="z-10 relative flex-1 space-y-8 group">
    <h1 class="XXfont-orbitron font-black text-5xl flex items-center gap-2">
        <x-icons.material class="text-6xl group-hover:text-highlight-500 transition-all duration-500">account_circle</x-icons-material>
        <span class="flex-1">Dashboard</span>
        <ul class="text-base flex gap-2">
            <li>
                <x-primary-button href="{{ route('profile.edit') }}">User Profile</x-primary-button>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <x-primary-button type="submit">
                        Logout
                    </x-primary-button>
                </form>
            </li>
        </ul>
    </h1>
    <div class="prose prose-xl prose-primary">
        <p>Welcome back {{ Auth::user()->name }}.</p>


        {{-- <h2>Collectables</h2>
        <p>My first range of collectable digital assets will be launched soon.</p>

        <h2>Trophies &amp; Achievements</h2>
        <p>You have earned 0 trophies and 0 achievements.</p>
        <p>
            <x-icons.material class="text-6xl">emoji_events</x-icons.material>
            Registered new account
        </p>
        <p>
            <x-icons.material class="text-6xl">emoji_events</x-icons.material>
            Returning user
        </p>
        <p>
            <x-icons.material class="text-2xl">emoji_events</x-icons.material>
            Explorer
        </p>
        <p>
            <x-icons.material class="text-2xl">emoji_events</x-icons.material>
            Savior
        </p>
        <h2>Easter Eggs</h2>
        <p>You have found 0 easter eggs ... keep hunting</p> --}}
    </div>
</div>





