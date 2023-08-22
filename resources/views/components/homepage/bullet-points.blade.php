{{--
    This component is used to display the bullet points on the homepage.
    It takes in an array of bullet points and displays them in a grid.
--}}
@props(['bullets' => []])

<ul class="h-full grid grid-cols-2 gap-4 items-center">
    @foreach ($bullets as $bullet)
        <li
            class="{{ $bullet->colour }} grid h-full items-center text-center py-4 opacity-80
                hover:rounded-xl hover:text-primary-800 XXhover:tracking-wider hover:scale-105 hover:font-bold hover:opacity-100 transition ease-in-out hover:transition-all"
        >{{ $bullet->name }}</li>
    @endforeach
</ul>
