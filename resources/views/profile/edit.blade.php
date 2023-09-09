
<x-ui-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-300 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="relative z-10 grid grid-cols-2 gap-8">
        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
        @include('profile.partials.delete-user-form')
    </div>
</x-ui-layout>
