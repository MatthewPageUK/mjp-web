@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'bg-red-600 text-sm text-yellow-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
