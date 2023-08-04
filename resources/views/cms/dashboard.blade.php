<x-cms-layout
    title="Content Management System"
>

    <div class="grid sm:grid-cols-12 gap-8">

        {{-- Bullet Points --}}
        <x-cms.dashboard.widget title="Bullet Points" :count="count($this->bulletPoints)" >
            <ul class="py-4">
                <li>
                    <a href="{{ route('cms.bullet-points') }}">View Bullet Points</a>
                </li>
                <li>
                    <a href="{{ route('cms.bullet-points', ['mode' => 'create']) }}">Add Bullet Point</a>
                </li>
            </ul>
            <p class="py-4">
            <x-cms.form.select class="w-full"
                x-data="{ link : '' }"
                x-model="link"
                x-init="$watch('link', value => window.location = link)"
            >
                <option>Choose a bullet</option>
                @foreach ($this->bulletPoints as $id => $title)
                    <option value="{{ route('cms.bullet-points', ['mode' => 'edit', 'id' => $id]) }}">{{ $title }}</option>
                @endforeach
            </x-cms.form.select>
            </p>
        </x-cms.dashboard.widget>

        {{-- Demos --}}
        <x-cms.dashboard.widget title="Demos" :count="count($this->bulletPoints)" >
            <ul class="py-4">
                <li>
                    <a href="{{ route('cms.demos') }}">View Demos</a>
                </li>
                <li>
                    <a href="{{ route('cms.demos', ['mode' => 'create']) }}">Add Demo</a>
                </li>
            </ul>
            <p class="py-4">
            <x-cms.form.select class="w-full"
                x-data="{ link : '' }"
                x-model="link"
                x-init="$watch('link', value => window.location = link)"
            >
                <option>Choose a demo</option>
                @foreach ($this->demos as $id => $name)
                    <option value="{{ route('cms.demos', ['mode' => 'edit', 'id' => $id]) }}">{{ $name }}</option>
                @endforeach
            </x-cms.form.select>
            </p>
        </x-cms.dashboard.widget>

        {{-- Posts --}}
        <x-cms.dashboard.widget title="Posts" :count="count($this->posts)" >
            <ul class="py-4">
                <li>
                    <a href="{{ route('cms.posts') }}">View Posts</a>
                     | <a href="{{ route('cms.posts.categories') }}">Categories</a>
                </li>
                <li>
                    <a href="{{ route('cms.posts', ['mode' => 'create']) }}">Add Post</a>
                      | <a href="{{ route('cms.posts.categories', ['mode' => 'create']) }}">Category</a>
                </li>
            </ul>
            <p class="py-4">
            <x-cms.form.select class="w-full"
                x-data="{ link : '' }"
                x-model="link"
                x-init="$watch('link', value => window.location = link)"
            >
                <option>Choose a post</option>
                @foreach ($this->posts as $id => $name)
                    <option value="{{ route('cms.posts', ['mode' => 'edit', 'id' => $id]) }}">{{ $name }}</option>
                @endforeach
            </x-cms.form.select>
            </p>
        </x-cms.dashboard.widget>

        {{-- Skills --}}
        <x-cms.dashboard.widget title="Skills" :count="count($this->skills)" >
            <ul class="py-4">
                <li class="flex">
                    <a href="{{ route('cms.skills') }}">View Skills</a>
                     |
                     <a href="{{ route('cms.skills.groups') }}" class="
                     {{-- flex items-center rounded px-6 py-2 gap-2
                        bg-black border border-t-zinc-700 border-r-zinc-700 border-b-zinc-900 border-l-zinc-900
                        hover:text-amber-400 hover:bg-zinc-700 hover:border-t-zinc-500 hover:border-r-zinc-500 hover:border-b-zinc-900 hover:border-l-zinc-900 --}}
                        ">
                     <x-icons.material class="" >visibility</x-icons.material>
                     Groups</a>

                </li>
                <li class="flex">

                    {{-- <a href="{{ route('cms.skills.groups') }}" class="w-12 flex items-center justify-center rounded px-2 py-2 gap-2
                            bg-black border border-t-zinc-700 border-r-zinc-700 border-b-zinc-900 border-l-zinc-900
                            hover:text-amber-400 hover:bg-zinc-700 hover:border-t-zinc-500 hover:border-r-zinc-500 hover:border-b-zinc-900 hover:border-l-zinc-900">
                        <x-icons.material class="" >visibility</x-icons.material>
                    </a>

                    <a href="{{ route('cms.skills.groups') }}" class="w-12 flex items-center justify-center rounded px-2 py-2 gap-2
                            bg-black border border-t-zinc-700 border-r-zinc-700 border-b-zinc-900 border-l-zinc-900
                            hover:text-amber-400 hover:bg-zinc-700 hover:border-t-zinc-500 hover:border-r-zinc-500 hover:border-b-zinc-900 hover:border-l-zinc-900">
                        <x-icons.material class="" >add_cirlce</x-icons.material>
                    </a> --}}


                    <a href="{{ route('cms.skills', ['mode' => 'create']) }}">Add Skill</a>
                      | <a href="{{ route('cms.skills.groups', ['mode' => 'create']) }}">Group</a>
                </li>
            </ul>
            <p class="py-4">
            <x-cms.form.select class="w-full"
                x-data="{ link : '' }"
                x-model="link"
                x-init="$watch('link', value => window.location = link)"
            >
                <option>Choose a skill</option>
                @foreach ($this->skills as $skill)
                    <option value="{{ route('cms.skills', ['mode' => 'edit', 'id' => $skill->id]) }}">{{ $skill->name }}</option>
                @endforeach
            </x-cms.form.select>
            </p>
        </x-cms.dashboard.widget>

        {{-- <livewire:skill.cms.dashboard.widget /> --}}

    </div>

</x-cms-layout>
