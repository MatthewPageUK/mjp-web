<?php

namespace App\Http\Livewire\Ui\Traits;

trait HasSearchFilter
{
    /**
     * The search filter
     *
     * @var string
     */
    public $search = '';

    /**
     * Reset the search filter
     *
     * @return void
     */
    public function resetSearch(): void
    {
        $this->search = '';
    }

    /**
     * Updated search
     *
     * @return void
     */
    public function updatedSearch()
    {
        if (method_exists($this, 'resetPage')) {
            $this->resetPage();
        }
    }
}
