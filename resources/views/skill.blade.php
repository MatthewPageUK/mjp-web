{{--
    Skill detail page
--}}
<x-ui-layout
    title="{{ Settings::getValue('site_name') }} - {{ $skill->name }} skills"
>

    <div class="border-b pb-8 mb-16">
        <h1 class="text-6xl font-black flex items-center">
            <span class="flex-1">{{ $skill->name }}</span>
            <span class="material-icons-outlined text-6xl ml-1">construction</span>
        </h1>
    </div>

    <div class="lg:grid lg:grid-cols-2 gap-x-16">

        <div>
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

        <div class="text-right">

            <x-related.links :model="$skill" />

        </div>

    </div>

</x-ui-layout>
