{{--
    Individual Session flash message with auto-hide after 'timeout' milliseconds

    @todo @bug Oftens fails to show again after it's been hidden once.
--}}
@props([
    'type' => 'message',
    'timeout' => 3000,
    'class' => 'text-amber-600 border-amber-500'
])

@if (session()->has($type))
    <div
        wire:key="session-{{ $type }}"
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, {{ $timeout }})"
        class="my-8 p-4 text-sm rounded-lg bg-black border border-2 shadow-lg {{ $class }}"
        role="alert"
    >
        {{ session($type) }}
    </div>
@endif