<title>{{ Page::getTitle() }}</title>

@if (Page::hasDescription())
    <meta name="description" content="{{ Page::getDescription() }}">
@endif

@if (Page::hasKeywords())
    <meta name="keywords" content="{{ Page::getKeywords() }}">
@endif

@if (Page::hasRobots())
    <meta name="robots" content="{{ Page::getRobots() }}">
@endif
