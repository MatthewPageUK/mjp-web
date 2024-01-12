<?php

namespace App\Livewire\Ui\Journal;

use App\Services\Ui\JournalService;
use App\View\Components\UiLayout;
use Illuminate\{
    Support\Collection,
    View\View,
};
use Livewire\Component;

/**
 * Journal homepage widget
 *
 * @todo wip
 *
 */
class Widget extends Component
{
    /**
     * Get the journal entries for showing on the homepage.
     *
     * @param JournalService $journalService
     * @var Collection
     */
    public function getEntriesProperty(JournalService $journalService): Collection
    {
        try {
            $entries = $journalService->getRecent(5);

        } catch (\Exception $e) {
            // @todo Log this
            $entries = collect();
        }

        return $entries;
    }

    /**
     * Render the Journal widget
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.journal.homepage')
            ->layout(UiLayout::class);
    }
}
