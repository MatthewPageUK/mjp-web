@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-primary-900 border-primary-700 focus:border-secondary-500 focus:ring-secondary-500 rounded-md shadow-sm']) !!}>
