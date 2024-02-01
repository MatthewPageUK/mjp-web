<div>
    <div class="border-b pb-8 mb-4">
        <h1 class="text-6xl font-black flex items-center">
            <span class="flex-1">{{ $experience->name }}</span>
            <x-icons.material class="text-6xl ml-1">public</x-icons.material>
        </h1>
    </div>

    <div class="lg:grid lg:grid-cols-3 gap-x-16 my-16">
        <div class="col-span-2">

            {{-- Date from / to--}}
            <div class="mb-8 text-lg grid grid-cols-3 items-center border border-primary-700 rounded-lg bg-primary-900 overflow-hidden p-4">
                <div class="flex items-center gap-4">
                    {{-- Previous experience --}}
                    @if ($this->previous)
                        <a href="{{ $this->previous->routeUrl }}" class="flex items-center leading-none" title="Previous work experience">
                            <x-icons.material class="rotate-180">start</x-icons.material>
                        </a>
                    @endif
                    <span class="text-xl font-semibold">{{ $experience->start->format('F Y') }}</span>
                </div>

                {{-- Duration --}}
                <div class="text-center text-sm">
                    {{ $experience->end->diffForHumans($experience->start, $experience->end::DIFF_ABSOLUTE) }}
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-xl font-semibold text-right flex-1">{{ $experience->end->format('F Y') }}</span>
                    {{-- Next experience --}}
                    @if ($this->next)
                        <a href="{{ $this->next->routeUrl }}" class="flex items-center leading-none" title="Next work experience">
                            <x-icons.material>start</x-icons.material>
                        </a>
                    @endif
                </div>
            </div>

            <x-ui.imageable :model="$experience" />

            {{-- Description --}}
            <div class="prose prose-xl prose-primary">
                @markdown($experience->description)
            </div>

            {{-- Key Points --}}
            <div class="flex items-end mt-8">
                <x-ui.experience.key-points :key_points="$experience->key_points" />
            </div>

        </div>

        <div>
            {{-- Related links --}}
            <x-related.links :model="$experience" />
        </div>

    </div>
</div>
