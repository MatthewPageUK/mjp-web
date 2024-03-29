<?php

namespace App\Livewire\Ui\Traits;

use Illuminate\Database\Eloquent\Collection;

trait HasPostCategoryFilter
{
    /**
     * Categories used
     *
     * @var array
     */
    public $categories = [];

    /**
     * Selected skill
     *
     * @var string
     */
    public $selectedCategory = '';


    /**
     * Set the selectable categories
     *
     * @return void
     */
    public function setCategories(Collection $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Reset the selected category
     *
     * @return void
     */
    public function resetCategory()
    {
        $this->selectedCategory = '';
    }
}
