<?php

namespace App\Livewire\Cms;

use App\Facades\Cms\Experiences;

/**
 * CMS - Experiences Editor component
 *
 * Shows a list of Experiences with create, update, delete,
 * move up and down functions.
 *
 */

class ExperiencesEditor extends CrudAbstract
{
    /**
     * Readable name of the model
     *
     * @var string
     */
    public $modelName = "Experience";

    /**
     * The service facade to use for CRUD operations
     *
     * @var string
     */
    public $service = Experiences::class;

    /**
     * The view used to render the CMS page.
     *
     * @var string
     */
    public $view = "cms.experiences.index";

    /**
     * Title of the CMS Page
     *
     * @var string
     */
    public $title = "CMS - Experiences";

    /**
     * Validation rules
     *
     * @var array
     */
    public $rules = [
        'model.name' => 'required|string|min:2',
        'model.slug' => 'nullable',
        'model.description' => 'nullable',
        'model.key_points' => 'nullable|array',
        'model.key_points.*.title' => 'required|string',
        'model.key_points.*.text' => 'nullable|string',
        'model.start' => 'nullable|date',
        'model.end' => 'nullable|date',
        'model.active' => 'boolean',
    ];

    /**
     * Save the changes to the current model.
     *
     * Overrided to allow for filtering of key points
     *
     * @todo The filterKeyPoints could be moved to the model or the serivce beforeUpdating() method
     * @return void
     */
    public function save(): void
    {
        $this->filterKeyPoints();

        $this->executeSave(function () {
            $this->service::update($this->model->id, $this->model->toArray());
        });

        $this->setList();
    }

    /**
     * Remove a key point from the array
     *
     * @param int $index
     * @return void
     */
    public function removeKeyPoint(int $index): void
    {
        $this->filterKeyPoints($index);
    }

    /**
     * Filter out empty key points or
     * matching $index
     *
     * @param int|null $index
     * @return void
     */
    public function filterKeyPoints(?int $index = null): void
    {
        $key_points = [];
        foreach($this->model->key_points as $key => $value) {
            if ($value['title'] !== '' && $key !== $index) {
                $key_points[] = $value;
            }
        }

        $this->model->key_points = $key_points;
    }

}
