{{--
    UI - Auth - Register
--}}
<x-ui-layout>

    <div class="flex-1 space-y-8 group max-w-3xl mx-auto">
        <h1 class="XXfont-orbitron font-black text-5xl flex items-center gap-2">
            <x-icons.material class="group-hover:animate-pulse text-6xl group-hover:text-highlight-500 transition-all duration-500">group_add</x-icons-material>
            Register
        </h1>
        <div class="prose prose-xl prose-primary">
            @markdown(Settings::tryGetValue('register_intro') ?? '')
        </div>

        <form method="POST" action="{{ route('register') }}" class="max-w-3xl">
            @csrf

            <!-- Name -->
            <div>
                <x-auth.input-label for="name" :value="__('Name')" />
                <x-auth.text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-auth.input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-auth.input-label for="email" :value="__('Email')" />
                <x-auth.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-auth.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="md:grid md:grid-cols-2 md:gap-8">
                <!-- Password -->
                <div class="mt-4">
                    <x-auth.input-label for="password" :value="__('Password')" />

                    <x-auth.text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-auth.input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-auth.input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-auth.text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-auth.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

            </div>

            <div class="flex items-center justify-end mt-8">
                <a class="underline text-sm text-primary-400 hover:text-primary-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4 hover:animate-wiggle">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    {{-- <div class="w-full md:w-1/2 mx-auto md:p-16"> --}}

        {{-- <h1 class="XXfont-orbitron text-4xl flex items-center mb-8">
            Register for VIP access
            <x-icons.material class="text-6xl">group_add</x-icons.material>
        </h1> --}}


    {{-- </div> --}}
</x-ui-layout>
