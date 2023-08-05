@props([
    'name' => '',
])
<label class="col-span-12 md:col-span-3 block mb-2">{{ $name }}</label>
<div class="col-span-12 md:col-span-9">
    {{ $slot }}
</div>