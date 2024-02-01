<x-ui-layout>

    <div class="w-full md:w-1/2 mx-auto md:p-16">

        <!-- Session Status -->
        <x-auth.auth-session-status class="mb-4" :status="session('status')" />

        <h1 class="XXfont-orbitron text-4xl flex items-center mb-8">
            <span class="flex-1">Login</span>
            <x-icons.material class="text-6xl">login</x-icons.material>
        </h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-auth.input-label for="email" :value="__('Email')" />
                <x-auth.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-auth.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-auth.input-label for="password" :value="__('Password')" />

                <x-auth.text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-auth.input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-8">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded bg-primary-900 border-primary-700 text-secondary-600 shadow-sm focus:ring-secondary-500" name="remember">
                    <span class="ml-2 text-sm text-primary-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3 hover:animate-wiggle">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-ui-layout>
