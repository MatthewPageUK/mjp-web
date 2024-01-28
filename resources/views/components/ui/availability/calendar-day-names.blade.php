@foreach (['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
    <div class="text-sm text-center font-light hidden md:block">{{ $day }}</div>
@endforeach