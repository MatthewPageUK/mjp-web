<?php

namespace App\Http\Livewire\Cms\Traits;

use App\Enums\CrudModes;
use Closure;
use Illuminate\Http\Request;

/**
 * Extra functions and helpers for dealing with the general
 * CRUD operations of the CMS Livewire components.
 */
trait HasCrudActions
{
    /**
     * Set the mode for the component from the request
     * variable via the URL
     *
     * @param Request $request
     * @return void
     */
    public function setRequestMode(Request $request)
    {
        switch ($request->mode) {
            case CrudModes::Create->value:
                $this->add();
                break;

            case CrudModes::Update->value:
                $this->update($request->id);
                break;

            case CrudModes::Delete->value:
                $this->confirmDelete($request->id);
                break;
        }
    }

    /**
     * Show the form to add a new model
     *
     * @return void
     */
    public function add(): void
    {
        $this->setMode(CrudModes::Create);
        $this->setModel();
    }

    /**
     * Cancel and reset the creation form.
     *
     * @return void
     */
    public function cancelAdd(): void
    {
        $this->setMode(CrudModes::Read);
        $this->setModel();
    }

    /**
     * Cancel the delete operation and reset the form.
     *
     * @return void
     */
    public function cancelDelete(): void
    {
        $this->setMode(CrudModes::Read);
        $this->setModel();
    }

    /**
     * Cancel the update operation and reset the form.
     *
     * @return void
     */
    public function cancelUpdate(): void
    {
        $this->setMode(CrudModes::Read);
        $this->setModel();
    }

    /**
     * Show the confirmation dialog for deleting a model
     *
     * @param int $id
     * @return void
     */
    public function confirmDelete(int $id): void
    {
        try {
            $this->model = $this->getModel($id);

        } catch (\Exception $e) {
            session()->flash('error', sprintf('Error finding %s - %s', $this->modelName, $e->getMessage()));
            return;
        }

        $this->setMode(CrudModes::Delete);
    }

    /**
     * Show the form to edit a model
     *
     * @param int $id
     * @return void
     */
    public function update(int $id): void
    {
        try {
            $this->model = $this->getModel($id);

        } catch (\Exception $e) {
            session()->flash('error', sprintf('Error finding %s - %s', $this->modelName, $e->getMessage()));
            return;
        }

        $this->setMode(CrudModes::Update);
    }


    /**
     * Execute the create function and handle any errors
     *
     * @param Closure $create   The function to create the model
     * @return void
     */
    public function executeCreate(Closure $create): void
    {
        $this->validate();

        try {
            $create();
            session()->flash('success', sprintf('Created new %s - %s', $this->modelName, $this->model->name));

        } catch (\Exception $e) {
            session()->flash('error', sprintf('Error creating %s - %s', $this->modelName, $e->getMessage()));
            return;
        }

        $this->cancelAdd();
    }

    /**
     * Execute the delete function and handle any errors
     *
     * @param Closure $delete   The function to delete the model
     * @return void
     */
    public function executeDelete(Closure $delete): void
    {
        try {
            $delete();
            session()->flash('success', sprintf('Deleted %s - %s', $this->modelName, $this->model->name));

        } catch (\Exception $e) {
            session()->flash('error', sprintf('Error deleting %s - %s', $this->modelName, $e->getMessage()));
        }

        $this->cancelDelete();
    }

    /**
     * Execute the save function and handle any errors
     *
     * @param Closure $save   The function to update the model
     * @return void
     */
    public function executeSave(Closure $save): void
    {
        $this->validate();

        try {
            $save();
            session()->flash('success', sprintf('Updated %s - %s', $this->modelName, $this->model->name));

        } catch (\Exception $e) {
            session()->flash('error', sprintf('Error updating %s - %s', $this->modelName, $e->getMessage()));
        }

        $this->cancelUpdate();
    }
}