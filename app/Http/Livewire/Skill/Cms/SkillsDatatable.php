<?php

namespace App\Http\Livewire;

use App\Facades\LessonPlans;
use App\Models\LessonPlan;
use App\Services\SkillService;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Skills data table component to show a searchable
 * and paginated table of lesson plans.
 *
 */
class SkillsDatatable extends Component
{
    use WithPagination;

    /**
     * The search string.
     *
     * @var string
     */
    public $search = '';

    /**
     * Rows per page.
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * ID of a lesson plan to delete.
     * When this value is set the confirmation
     * popup is shown.
     *
     * @var int
     */
    public $deleteId = null;

    /**
     * Query string variables.
     *
     * @var array
     */
    protected $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => ''],
    ];

    /**
     * Mount the data table component.
     *
     */
    public function mount()
    {

    }

    /**
     * Sets and caches a computed `$rows` property of this
     * Datatable object.
     *
     * Gets a filtered query builder from the LessonPlanService
     * and then paginates for output.
     *
     * @return LengthAwarePaginator
     * @throws InvalidArgumentException
     */
    public function getRowsProperty()
    {
        $query = app()->make(SkillService::class)->getFilteredQuery();
        $rows = $query->paginate($this->perPage);

        return $rows;
    }

    /**
     * Resets the pagination.
     *
     * @return void
     */
    public function resetPagination()
    {
        $this->resetPage();
    }

    /**
     * Reset the search filter
     *
     * @return void
     */
    public function resetSearch(): void
    {
        $this->reset('search');
        $this->resetPagination();
    }

    /**
     * Resets the pagination when a
     * keyword search is performed.
     *
     * Livewire hook which runs when
     * this component's 'search'
     * property is updated.
     *
     * @return void
     */
    public function updatingSearch()
    {
        $this->resetPagination();
    }

    /**
     * Render the component with the standard
     * layouts.app in the `content` slot.
     *
     * @return Illuminate\View\View
     * @throws InvalidArgumentException
     * @throws BindingResolutionException
     */
    public function render()
    {
        return view('lesson-plans.datatable')
            ->extends('layouts.app')
            ->slot('content');
    }

    /**
     * Sets the ID of the lesson plan to delete.
     *
     * @param int $id
     * @return void
     */
    public function setDeleteId($id)
    {
        $this->deleteId = $id;
    }

    /**
     * Delete a lesson plan.
     *
     * @return void
     */
    public function delete()
    {
        try {
            $lessonPlan = LessonPlan::findOrFail($this->deleteId);
            $lessonPlan->delete();
            $this->deleteId = null;

            session()->flash('success', 'Lesson plan deleted.');

        } catch (\Exception $e) {
            report($e);
            session()->flash('error', sprintf('Failed to delete lesson plan - %s', $e->getMessage()));
        }
    }
}