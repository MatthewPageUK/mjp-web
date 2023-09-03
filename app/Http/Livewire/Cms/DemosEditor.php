<?php

namespace App\Http\Livewire\Cms;

use App\Facades\Cms\Demos;

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
        //dd($message);
    }

}
