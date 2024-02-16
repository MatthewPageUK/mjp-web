@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => '
        border-0
        dark:bg-primary-900
        dark:border-primary-700
        focus:border-secondary-500
        focus:ring-secondary-500
        rounded-md shadow-sm'

]) !!}>
