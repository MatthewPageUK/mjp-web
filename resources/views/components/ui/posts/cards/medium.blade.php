{{--
    Shows post in medium vertical card with image, title, skills and date.
--}}
<div class="border rounded-lg overflow-hidden border border-primary-700 rounded-lg bg-primary-800 hover:bg-primary-700 hover:border-primary-600 pb-2">

    <a href="{{ $post->url }}" class="block" title="View the '{{ $post->name }}' post">
        <img src="{{ $post->image }}" />
        <span class="block leading-tight text-lg p-4 pb-2">{{ $post->name }}</span>
        <span class="text-xs px-4">{{ $post->skills->pluck('name')->implode(', ') }}</span>

        <x-ui.badges.age :date="$post->created_at" class="px-4" />
    </a>
</div>