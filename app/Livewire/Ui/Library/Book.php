<?php

namespace App\Livewire\Ui\Library;

use App\Enums\BookReadingSort;
use App\Models\Book as BookModel;
use App\Services\PageService;
use App\View\Components\UiLayout;
use Livewire\Component;

class Book extends Component
{
    /**
     * Book to show
     *
     * @var BookModel|null
     */
    public ?BookModel $book;

    /**
     * Sort reading sessions by
     *
     * @var BookReadingSort
     */
    public BookReadingSort $sort = BookReadingSort::Latest;

    /**
     * Mount the component and populate the data
     *
     * @param PageService $page
     * @param Book $book
     * @return void
     */
    public function mount(PageService $page, BookModel $book): void
    {
        $this->book->load(['readings', 'image']);

        $page->setBackgroundImage('mjp-back-library.jpg');
        $page->setTitle('Books');
        $page->appendTitle($this->book->name);
    }

    /**
     * Get the reading sessions for this book
     *
     * @return Collection
     */
    public function getReadingsProperty()
    {
        return match($this->sort) {
            BookReadingSort::Latest     => $this->book->readings->sortByDesc('created_at'),
            BookReadingSort::Oldest     => $this->book->readings->sortBy('created_at'),
            BookReadingSort::Chapter    => $this->book->readings->sortBy('chapter'),
            default                     => $this->book->readings,
        };
    }

    /**
     * Set the reading sort
     *
     * @param string $sort
     * @param string $direction
     * @return void
     */
    public function setReadingSort(string $sort)
    {
        $this->sort = BookReadingSort::tryFrom($sort) ?? BookReadingSort::Latest;
    }

    /**
     * Render the Book view
     *
     * @return View
     */
    public function render()
    {
        return view('ui.library.book')
            ->layout(UiLayout::class);
    }
}
