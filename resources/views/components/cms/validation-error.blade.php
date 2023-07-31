@props(['field'])

@error($field)
    <span class="block w-full my-2 px-4 py-2 text-sm text-red-600 rounded-lg bg-black border border-2 border-red-800 shadow-lg">{{ $message }}</span>
@enderror