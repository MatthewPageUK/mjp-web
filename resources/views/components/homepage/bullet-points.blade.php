{{--
    This component is used to display the bullet points on the homepage.
    It takes in an array of bullet points and displays them in a grid.
--}}
@props(['bullets' => []])

<ul class="grid grid-cols-2 gap-4">
    @foreach ($bullets as $point)
        <li
            class="{{ $point->colour }} text-center py-4 opacity-80 hover:tracking-wider hover:scale-105 hover:font-bold hover:opacity-100 transition ease-in-out hover:transition-all"
        >{{ $point->title }}</li>
    @endforeach
</ul>