{{-- UI - Jump to random page button --}}
<div class="text-center">
    <h1 class="text-2xl font-black font-orbitron text-secondary-400 my-4">
        Still looking for more?
    </h1>
    <x-primary-button class="text-sm" href="{{ $this->page }}">
        <x-icons.material class="mr-1 text-5xl">quiz</x-icons.material>
        Jump to random page
    </x-primary-button>
</div>