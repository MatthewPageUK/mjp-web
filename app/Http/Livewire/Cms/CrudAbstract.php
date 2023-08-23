<?php

namespace App\Http\Livewire\Cms;

use App\Http\Livewire\Cms\Traits\{
    HasCrudActions,
    HasCrudModes,
};
use App\View\Components\CmsLayout;
use Illuminate\{
    Http\Request,
    View\View,
};
use Livewire\Component;

/**
 * CMS - Livewire Crud Actions Abstract
 *
 * Provides the basic CRUD actions for the CMS Livewire components.
 *
 * See also -
 * app/Http/Livewire/Cms/Traits/HasCrudActions.php
 * app/Http/Livewire/Cms/Traits/HasCrudModes.php
 */

abstract class CrudAbstract extends Component
{
    use HasCrudModes;
    use HasCrudActions;

    /**
     * Readable name of the model.
     * eg. "Post Categories"
     *
     * @var string
     */
    public $modelName;

    /**
     * The service facade used for CRUD operations
     *
     * @var string
     */
    public $service;

    /**
     * The view used to render the CMS page.
     *
     * @var string
     */
    public $view;

    /**
     * Title of the CMS Page
     *
     * @var string
     */
    public $title;

    /**
     * Editable model instance.
     *
     * @var mixed
     */
    public $model;

    /**
     * All models
     *
     * @var array|Collection
     */
    public $list = [];

    /**
     * Mount the component and populate the data
     *
     * @param Request $request
     * @return void
     */
    public function mount(Request $request)
    {
        $this->setModel();
        $this->setList();
        $this->setRequestMode($request);
    }

    /**
     * Hydrate the component
     *
     * @return void
     */
    public function hydrate()
    {
        $this->setList();
    }

    /**
     * Set the model list
     *
     * @return void
     */
    public function setList(): void
    {
        $this->list = $this->service::getAll();
    }

    /**
     * Set the editable model for this component
     * to a new blank model.
     *
     */
    public function setModel($data = [])
    {
        $this->model = $this->service::new($data);
    }

    /**
     * Get the model for ID
     *
     * @param int $id
     * @return mixed
     */
    public function getModel(int $id)
    {
        return $this->service::get($id);
    }

    /**
     * Create a new model from the details
     * in the form.
     *
     * @return void
     */
    public function create(): void
    {
        $this->executeCreate(function () {
            $this->model = $this->service::create($this->model->toArray());
        });

        $this->setList();
    }

    /**
     * Save the changes to the current model.
     *
     * @return void
     */
    public function save(): void
    {
        $this->executeSave(function () {
            $this->service::update($this->model->id, $this->model->toArray());
        });

        $this->setList();
    }

    /**
     * Delete the currently selected model
     *
     * Wraps the call in executeDelete() to catch
     * and flash error messages to the session.
     *
     * @return void
     */
    public function delete(): void
    {
        $this->executeDelete(function () {
            $this->service::delete($this->model->id);
        });

        $this->setList();
    }

    /**
     * Render the CMS page
     *
     * @return View
     */
    public function render(): View
    {
        return view($this->view)
            ->layout(CmsLayout::class, ['title' => $this->title]);
    }
}
