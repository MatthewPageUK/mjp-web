{{-- Crud field and label wrapper --}}
@props([
    'name' => '',
])
<label class="col-span-12 md:col-span-3">{{ $name }}</label>
<div class="col-span-12 md:col-span-9">
    {{ $slot }}
</div>