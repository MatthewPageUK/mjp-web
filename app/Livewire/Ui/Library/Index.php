<?php

namespace App\Livewire\Ui\Library;

use App\Enums\LibraryBookFilter;
use App\Services\{
    PageService,
    Ui\LibraryService
};
use App\View\Components\UiLayout;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Library component
 *
 */
class Index extends Component
{
    /**
     * Filter
     *
     * @var string
     */
    public LibraryBookFilter $filter = LibraryBookFilter::All;

    /**
     * Reading stats
     *
     * @var array
     */
    public $readingStats = [];

    /**
     * Mount the component and populate the data
     *
     * @param LibraryService $libraryService
     * @param PageService $page
     * @return void
     */
    public function mount(LibraryService $libraryService, PageService $page): void
    {
        $this->readingStats = [
            'thisMonth' => $libraryService->getTotalReadingMinutesThisMonth(),
            'lastMonth' => $libraryService->getTotalReadingMinutesLastMonth(),
        ];

        $page->setBackgroundImage('mjp-back-library.jpg');
        $page->setTitle('Library');
    }

    /**
     * Set the filter
     *
     * @param string $filter
     * @return void
     */
    public function setFilter(string $filter): void
    {
        $this->filter = LibraryBookFilter::tryFrom($filter) ?? LibraryBookFilter::All;
    }

    /**
     * Get the calcualated books property
     *
     * @param LibraryService $libraryService
     * @return Collection
     */
    public function getBooksProperty(LibraryService $libraryService): Collection
    {
        return match($this->filter) {
            LibraryBookFilter::Unfinished    => $libraryService->getUnfinishedBooks(),
            LibraryBookFilter::Unread        => $libraryService->getUnreadBooks(),
            LibraryBookFilter::Recent        => $libraryService->getRecentlyReadBooks(),
            default                          => $libraryService->getAllBooks(),
        };
    }

    /**
     * Get the calcualated recent readings property
     *
     * @param LibraryService $libraryService
     * @return Collection
     */
    public function getRecentReadingsProperty(LibraryService $libraryService): Collection
    {
        return $libraryService->getRecentReadings(8);
    }

    /**
     * Render the library page
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.library.library')
            ->layout(UiLayout::class);
    }

}
