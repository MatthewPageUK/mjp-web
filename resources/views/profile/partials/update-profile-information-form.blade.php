    <h1 class="font-orbitron font-black text-5xl flex items-center gap-2 col-span-2">
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

<section>
    <header>
        <h2 class="text-lg font-medium text-primary-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-primary-300">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-auth.input-label for="name" :value="__('Name')" />
            <x-auth.text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-auth.input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-auth.input-label for="email" :value="__('Email')" />
            <x-auth.text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-auth.input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-primary-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-primary-300 hover:text-primary-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-primary-300"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

