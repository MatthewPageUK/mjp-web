{{-- Main web site footer component --}}
<footer class="bg-primary-200 dark:bg-primary-800">
    <div class="w-full max-w-7xl mx-auto md:flex md:items-center px-6 py-4 text-sm ">
        <p class="flex-1">
            <x-ui.layout.footer.site-name />
        </p>

        <p class="flex-1 md:text-center text-xs text-primary-400">
            <x-ui.layout.footer.copyright />
        </p>

        <p class="flex-1">
            <x-ui.layout.footer.go-top-of-page />
        </p>
    </div>

    <div class="bg-white dark:bg-black ">
        <x-ui.layout.footer.code />
    </div>
</footer>