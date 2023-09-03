<section>
    <header>
        <h2 class="text-lg font-medium text-primary-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-primary-300">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-auth.input-label for="current_password" :value="__('Current Password')" />
            <x-auth.text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-auth.input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-auth.input-label for="password" :value="__('New Password')" />
            <x-auth.text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-auth.input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-auth.input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-auth.text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-auth.input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
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
