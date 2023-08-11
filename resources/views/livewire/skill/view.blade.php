
<div zclass="lg:grid lg:grid-cols-2 gap-x-16">

    <div>
        <h1 class="text-5xl mb-2 font-bold"><span class="material-icons-outlined text-4xl ml-1">construction</span> {{ $skill->name }}</h1>
        <p>
            @foreach ($skill->skillGroups as $skillGroup)
                <a class="border-r mr-2 pr-2 last:border-none" href="{{ route('skills.group', $skillGroup) }}">{{ $skillGroup->name }}</a>
            @endforeach
        </p>
        <p>
            <x-skills.stars :skill="$skill" />
            <p class="text-sm text-primary-500">Competent but may need some help...</p>
        </p>
        <p class="pt-8">{{ $skill->description }}</p>
    </div>

    <div class="mt-8">

        <x-related.links :model="$skill" />

    </div>

</div>