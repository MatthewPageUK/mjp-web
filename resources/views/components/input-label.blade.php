@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-green-700']) }}>
    {{ $value ?? $slot }}
</label>
