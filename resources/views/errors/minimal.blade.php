<x-ui-layout>
    <div class="text-center">
        <h1 class="text-6xl font-light text-center border rounded p-4 mb-8 bg-red-800">
            @yield('code')
        </h1>
        <p class="text-2xl mb-8">@yield('message')</p>

        <p>Sorry, we couldn't find what you are looking for. It may have moved, or it may no longer be available.</p>
    </div>
</x-ui-layout>
