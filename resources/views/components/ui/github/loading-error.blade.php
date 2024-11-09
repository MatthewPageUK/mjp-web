<div class="w-full text-xs bg-red-500 text-white p-4 rounded-lg flex gap-2 items-center">
    <x-icons.material class="text-4xl">{{ App\Enums\GithubIcon::Error->value }}</x-icons.material>
    {{ $this->error }}
</div>
