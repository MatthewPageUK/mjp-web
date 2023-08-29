<header class="md:flex mb-4 border-b pb-4">
    <h1 class="flex-1 text-2xl md:text-4xl flex gap-4 items-center font-orbitron">
        <x-icons.github class="w-8 h-8 fill-secondary-400" />
        Project Development
    </h1>
    <div class="flex gap-2">
        <x-primary-button class="bg-green-400 text-sm" href="{{ $this->urlClone }}" target="_blank">
            <span class="material-icons-outlined mr-1">folder_copy</span>
            Clone
        </x-primary-button>

        <x-primary-button class="text-sm" href="{{ $this->urlHome }}" target="_blank">
            <span class="material-icons-outlined mr-1">home_work</span>
            Code Home
        </x-primary-button>
    </div>
</header>
