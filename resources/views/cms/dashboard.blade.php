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

        <livewire:skill.cms.dashboard.widget />

    </div>

</x-cms-layout>
