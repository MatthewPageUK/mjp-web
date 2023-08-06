<?php

namespace App\Http\Livewire\Cms;

use App\Models\Setting;
use Livewire\Component;

/**
 * Livewire Setting component.
 *
 * Displays a single setting with an edit button.
 *
 */
class SettingEdit extends Component
{
    /**
     * The Setting instance
     *
     * @var Setting
     */
    public Setting $setting;

    /**
     * The setting value
     *
     * @var string
     */
    public $value;

    /**
     * Edit or view mode
     *
     * @var string
     */
    public $mode = 'view';

    /**
     * Mount the site setting component
     *
     * @param Setting $setting      The setting instance
     */
    public function mount(Setting $setting): void
    {
        $this->setting = $setting;
        $this->value = $setting->getValue();
    }

    /**
     * Validation rules for this Setting
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'value' => 'required',
        ];
    }

    /**
     * Enter edit mode
     *
     * @return void
     */
    public function edit(): void
    {
        $this->mode = "edit";
    }

    /**
     * Cancel edit mode
     *
     * @return void
     */
    public function cancel(): void
    {
        // Revert form field back to original value
        $this->value = $this->setting->getValue();
        $this->mode = "view";
    }

    /**
     * Save an edited setting
     *
     * @return void
     */
    public function save(): void
    {
        $this->validate();

        // Set the Setting value and update existing value to match
        $this->value = $this->setting->setValue($this->value);

        // Save the 'model' to the DB
        $this->setting->save();

        // Return to view mode
        $this->mode = "view";
    }

    /**
     * Render the setting view
     *
     * @return Response
     */
    public function render()
    {
        return view('cms.settings.edit');
    }
}