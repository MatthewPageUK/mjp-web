<?php

namespace App\Http\Livewire\Cms;

use App\Facades\Cms\BulletPoints;
use App\Http\Livewire\Cms\Traits\HasCrudActions;
use App\Http\Livewire\Cms\Traits\HasCrudModes;
use App\Models\BulletPoint;
use App\View\Components\CmsLayout;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Bullet Points Editor component
 *
 * Shows a list of Bullet Points with create, update, delete,
 * move up and down functions.
 *
 */

class BulletPointsEditor extends Component
{
    use HasCrudModes;
    use HasCrudActions;

    /**
     * Readable name of the model
     *
     * @var string
     */
    public $modelName = "Bullet Point";

    /**
     * Variable name of the model on the component
     *
     * @var string
     */
    public $modelVar = "bullet";

    /**
     * Editable bullet point.
     *
     * @var BulletPoint
     */
    public $bullet;

    /**
     * All bullet points
     *
     * @var array|Collection
     */
    public $points = [];

    /**
     * Validation rules
     *
     * @var array
     */
    public $rules = [
        'bullet.name' => 'required|string|min:2',
        'bullet.order' => 'required|between:0,10',
    ];

    /**
     * Mount the component and populate the data
     *
     * @param Request $request
     * @return void
     */
    public function mount(Request $request)
    {
        $this->setModel();
        $this->setPoints();
        $this->setRequestMode($request);
    }

    /**
     * Hydrate the component
     *
     * @return void
     */
    public function hydrate()
    {
        $this->setPoints();
    }

    /**
     * Set the bullet points
     *
     * @return void
     */
    public function setPoints()
    {
        $this->points = BulletPoints::getAllWithColour();
    }

    /**
     * Set the editable model for this component
     *
     */
    public function setModel($data = ['order' => '0'])
    {
        $this->bullet = BulletPoints::new($data);
    }

    /**
     * Get the model for ID
     *
     * @param int $id
     * @return mixed
     */
    public function getModel(int $id)
    {
        return BulletPoints::get($id);
    }

    /**
     * Create a new Bullet Point from the details
     * in the form.
     *
     * @return void
     */
    public function create(): void
    {
        $this->executeCreate(function () {
            $this->bullet = BulletPoints::create($this->bullet->toArray());
        });

        $this->setPoints();
    }

    /**
     * Delete the Bullet Point referenced by deleteId
     *
     * @return void
     */
    public function delete(): void
    {
        $this->executeDelete(function () {
            BulletPoints::delete($this->bullet->id);
        });

        $this->setPoints();
    }

    /**
     * Save the changes to the Bullet Point
     *
     * @return void
     */
    public function save(): void
    {
        $this->executeSave(function () {
            BulletPoints::update($this->bullet->id, [
                'name' => $this->bullet->name,
                'order' => $this->bullet->order
            ]);
        });

        $this->setPoints();
    }

    /**
     * Move the Bullet Point up or down
     *
     * @param string $direction     up|down
     * @param int $id
     * @return void
     */
    public function move(string $direction, int $id): void
    {
        try {
            if ($direction == 'up') {
                BulletPoints::moveUp($id);
            } else {
                BulletPoints::moveDown($id);
            }

            $this->setPoints();

        } catch (\Exception $e) {
            session()->flash('error', 'Error moving Bullet Point '.$e->getMessage());
        }
    }

    /**
     * Render the Bullet Points page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.bullet-points.index')
            ->layout(CmsLayout::class, ['title' => 'CMS - Bullet Points']);
    }
}
