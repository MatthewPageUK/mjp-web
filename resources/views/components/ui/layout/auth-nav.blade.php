{{-- UI - Layout Header - Auth nav bar --}}
@if (Route::has('login'))
    <nav class="mt-8 lg:mt-0 flex justify-center gap-4 lg:justify-start lg:fixed lg:top-0 lg:right-0 px-8 py-2 text-right text-sm tracking-tight font-light">
        @auth
            {{-- Logged in user dashboard --}}
            <x-ui.layout.auth-nav-button route="dashboard" title="Visit your dashboard" label="Dashboard" icon="account_circle" />
        @else
            {{-- Log in --}}
            <x-ui.layout.auth-nav-button route="login" title="Login to your account." label="Log in" icon="login" />

            @if (Route::has('register'))
                {{-- Register --}}
                <x-ui.layout.auth-nav-button route="register" title="Register for VIP access and digital treats...." label="Register" icon="group_add" />
            @endif
        @endauth
    </nav>
@endif