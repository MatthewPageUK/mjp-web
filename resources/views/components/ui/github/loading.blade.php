{{-- Loading message --}}
@use('App\Enums\GithubIcon')
<div wire:loading>
    <div class="w-full bg-green-500 text-white p-4 rounded-lg flex gap-2 items-center">
        <x-icons.material class="text-4xl animate-spin">{{ GithubIcon::Loading->value }}</x-icons.material>
        Loading data from Github...
    </div>
</div>
