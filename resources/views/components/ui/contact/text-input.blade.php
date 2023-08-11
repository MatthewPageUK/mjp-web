@props([
    'name' => '',
    'label' => '',
])

<div class="relative z-0 w-full mb-6 group">
    <input type="text" name="{{ $name }}" wire:model="{{ $name }}" class="
            appearance-none
            font-gochi
            text-2xl font-bold text-primary-900
            block py-1 pt-2 px-0 w-full bg-transparent
            border-0 border-b-2 border-primary-700
            focus:outline-none focus:ring-0 focus:border-primary-600 peer
            @error($name) border-red-500 @enderror
        " placeholder=" "
    />
    <label for="{{ $name }}" class="
        absolute
        peer-focus:font-medium
        text-sm text-primary-700
        duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]
        peer-focus:left-0 peer-focus:text-primary-700
        peer-placeholder-shown:scale-100
        peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
    >{{ $label }}</label>

</div>