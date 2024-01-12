{{--
    This component is used to display the bullet points on the homepage.
    It takes in an array of bullet points and displays them in a grid.
--}}
@props(['bullets' => []])

<ul class="h-full grid grid-cols-2 gap-1 lg:gap-4 items-center">
    @foreach ($bullets as $bullet)
        <li
            class="{{ $bullet->colour }} grid h-full items-center text-center py-2 lg:py-4 opacity-80 text-sm lg:text-base
                hover:rounded-xl hover:scale-105 hover:font-bold hover:opacity-100 transition
                ease-in-out hover:transition-all hover:animate-pulse
            "
        >{{ $bullet->name }}</li>
    @endforeach
</ul>
