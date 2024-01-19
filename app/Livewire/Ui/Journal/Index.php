<?php

namespace App\Livewire\Ui\Journal;

use App\Services\{
    PageService,
    Ui\JournalService,
};
use App\View\Components\UiLayout;
use Illuminate\{
    Support\Collection,
    View\View,
};
use Livewire\Component;

/**
 * Journal Index
 *
 * @todo wip
 *
 */
class Index extends Component
{
    /**
     * Introduction text
     *
     * @var string
     */
    public string $intro = 'intro....';

    public int $year = 2024;

    public int $month = 1;

    /**
     * Query string parameters
     *
     * @var array
     */
    protected $queryString = [
        'year'  => ['except' => '2024'],
        'month',
    ];

    /**
     * Mount the component
     *
     * @param PageService $page
     * @return void
     */
    public function mount(PageService $page): void
    {
        $page->setTitle('Developer Journal - ' . date("F", mktime(0, 0, 0, $this->month, 10)) . ' ' . $this->year);
    }

    /**
     * Get the list of months in the current year that
     * have journal entries.
     *
     * @param JournalService $journalService
     * @return Collection
     */
    public function getMonthsProperty(JournalService $journalService): Collection
    {
        return $journalService->getMonthsWithJournalEntries($this->year);
    }

    /**
     * Get the list of years that have journal entries.
     *
     * @param JournalService $journalService
     * @return Collection
     */
    public function getYearsProperty(JournalService $journalService): Collection
    {
        return $journalService->getYearsWithJournalEntries();
    }

    /**
     * Set the year property and set month to the first month
     * with journal entries.
     *
     * @param integer $year
     * @return void
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
        $this->month = $this->months->first()?->value;
    }
    /**
     * Get the journal entries for the current year and month.
     *
     * @param DemoService $demoService
     * @return Collection|LengthAwarePaginator
     */
    public function getEntriesProperty(JournalService $journalService): Collection
    {
        try {
            $entries = $journalService->getAll($this->year, $this->month);

        } catch (\Exception $e) {
            // @todo Log this
            throw($e);
            $entries = collect();
        }

        return $entries;
    }

    /**
     * Render the Journal page
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.journal.index')
            ->layout(UiLayout::class);
    }
}
