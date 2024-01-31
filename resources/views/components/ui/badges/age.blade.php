{{--
    Shows the post created date as diff for humans with icon
--}}
@props(['date'])
<span {{ $attributes->merge(['class' => 'block text-xs text-primary-400 flex items-center content-end gap-1']) }}>
    <x-icons.material class="text-sm">calendar_month</x-icons.material>
    @if (! is_string($date))
        {{ $date?->diffForHumans() }}
    @else
        {{ $date }}
    @endif
</span>
