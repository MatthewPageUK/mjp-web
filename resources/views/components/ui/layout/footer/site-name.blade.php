<a
    href="{{ route('home') }}"
    title="Homepage"
    class="hover:text-indigo-600 dark:hover:text-secondary-400"
>
    {{ Settings::tryGetValue('site_name') }} - {{ Settings::tryGetValue('site_tagline') }}
</a>
