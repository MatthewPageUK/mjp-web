<?php

namespace App\Http\Livewire\Cms;

use App\Facades\Cms\Demos;
use App\Facades\Page;
use App\Http\Livewire\Cms\Traits\HasCrudActions;
use App\Http\Livewire\Cms\Traits\HasCrudModes;
use App\Models\Demo;
use App\View\Components\CmsLayout;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Demos Editor component
 *
 * Shows a list of Demos with create, update, delete,
 * move up and down functions.
 *
 */

class DemosEditor extends CrudAbstract
{
    /**
     * Readable name of the model
     *
     * @var string
     */
    public $modelName = "Demo";

    /**
     * The service facade to use for CRUD operations
     *
     * @var string
     */
    public $service = Demos::class;

    /**
     * The view used to render the CMS page.
     *
     * @var string
     */
    public $view = "cms.demos.index";

    /**
     * Title of the CMS Page
     *
     * @var string
     */
    public $title = "CMS - Demos";




    protected $listeners = ['mediaSelected'];


    // /**
    //  * Variable name of the model on the component
    //  *
    //  * @var string
    //  */
    // public $modelVar = "demo";

    // /**
    //  * Editable demo.
    //  *
    //  * @var Demo
    //  */
    // public $demo;

    // /**
    //  * All demos
    //  *
    //  * @var array|Collection
    //  */
    // public $demos = [];

    /**
     * Validation rules
     *
     * @var array
     */
    public $rules = [
        'model.name' => 'required|string|min:2',
        'model.slug' => 'nullable',
        'model.description' => 'nullable',
        'model.url' => 'nullable',
        'model.demo_url' => 'nullable',
        'model.active' => 'boolean',
    ];

    public function mediaSelected($message)
    {
        dd($message);
    }

    /**
     * Mount the component and populate the data
     *
     * @param Request $request
     * @return void
     */
    // public function mount(Request $request)
    // {
    //     $this->setModel();
    //     $this->setDemos();
    //     $this->setRequestMode($request);
    // }

    /**
     * Hydrate the component
     *
     * @return void
     */
    // public function hydrate()
    // {
    //     $this->setDemos();
    // }

    /**
     * Set the Demos
     *
     * @return void
     */
    // public function setDemos()
    // {
    //     $this->demos = Demos::getAll();
    // }

    /**
     * Set the editable model for this component
     *
     */
    // public function setModel($data = [])
    // {
    //     $this->demo = Demos::new($data);
    // }

    /**
     * Get the model for ID
     *
     * @param int $id
     * @return mixed
     */
    // public function getModel(int $id)
    // {
    //     return Demos::get($id);
    // }

    /**
     * Create a new Demo from the details
     * in the form.
     *
     * @return void
     */
    // public function create(): void
    // {
    //     $this->executeCreate(function () {
    //         $this->demo = Demos::create($this->demo->toArray());
    //     });

    //     $this->setDemos();
    // }

    /**
     * Delete the Demo referenced by deleteId
     *
     * @return void
     */
    // public function delete(): void
    // {
    //     $this->executeDelete(function () {
    //         Demos::delete($this->demo->id);
    //     });

    //     $this->setDemos();
    // }

    /**
     * Save the changes to the Demo
     *
     * @return void
     */
    // public function save(): void
    // {
    //     $this->executeSave(function () {
    //         Demos::update($this->demo->id, $this->demo->toArray());
    //     });

    //     $this->setDemos();
    // }

    /**
     * Render the Demos page
     *
     * @return View
     */
    // public function render(): View
    // {
    //     Page::setTitle('CMS - Demos');

    //     return view('cms.demos.index')
    //         ->layout(CmsLayout::class, ['title' => 'CMS - Demos']);
    // }
}
