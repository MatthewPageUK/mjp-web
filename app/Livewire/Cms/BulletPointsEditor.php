<?php

namespace App\Livewire\Cms;

use App\Facades\Cms\BulletPoints;

/**
 * CMS - Bullet Points Editor component
 *
 * Shows a list of Bullet Points with create, update, delete,
 * move up and down functions.
 *
 * Uses the CrudAbstract class for the basic CRUD functions.
 *
 */

class BulletPointsEditor extends CrudAbstract
{
    /**
     * Readable name of the model
     *
     * @var string
     */
    public $modelName = "Bullet Point";

    /**
     * The service facade to use for CRUD operations
     *
     * @var string
     */
    public $service = BulletPoints::class;

    /**
     * The view used to render the CMS page.
     *
     * @var string
     */
    public $view = "cms.bullet-points.index";

    /**
     * Title of the CMS Page
     *
     * @var string
     */
    public $title = "CMS - Bullet Points";

    /**
     * Validation rules
     *
     * @var array
     */
    public $rules = [
        'model.name' => 'required|string|min:2',
        'model.order' => 'required|between:0,100',
    ];

    /**
     * Set the bullet points list
     *
     * Overrided to get models
     * with the colour attached.
     *
     * @return void
     */
    public function setList(): void
    {
        $this->list = $this->service::getAllWithColour();
    }

    /**
     * Set the editable model for this component
     * to a new blank model.
     *
     * Overrided to allow for default values
     * for the order field.
     *
     */
    public function setModel($data = ['order' => '0'])
    {
        $this->model = $this->service::new($data);
    }

    /**
     * Move the model up or down in sort order.
     *
     * @param string $direction     up|down
     * @param int $id
     * @return void
     */
    public function move(string $direction, int $id): void
    {
        try {
            if ($direction == 'up') {
                $this->service::moveUp($id);
            } else {
                $this->service::moveDown($id);
            }

            $this->setList();

        } catch (\Exception $e) {
            session()->flash('error', 'Error moving ' . $this->modelName . ' '.$e->getMessage());
        }
    }

}
