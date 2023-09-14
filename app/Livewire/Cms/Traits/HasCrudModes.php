<?php

namespace App\Livewire\Cms\Traits;

use App\Enums\CrudModes;
use Illuminate\Validation\Rules\Enum;

/**
 * Helper for settings, getting and checking the CRUD mode.
 * Needed on all CRUD components.
 * Uses the CrudModes enum.
 *
 */
trait HasCrudModes
{
    /**
     * String mode name
     *
     * @var string
     */
    public $modeName = 'read';

    /**
     * Current mode
     *
     * @var Enum
     */
    protected CrudModes $mode = CrudModes::Read;

    /**
     * Set the mode
     *
     * @param string|CrudModes $mode
     * @return void
     */
    public function setMode(string|CrudModes $mode): void
    {
        if (is_string($mode)) {
            try {
                $mode = CrudModes::from($mode);
            } catch (\Exception $e) {
                $mode = CrudModes::Read;
            }
        }

        $this->mode = $mode;
        $this->modeName = $mode->value;
    }

    /**
     * Get the mode
     *
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode->value;
    }

    /**
     * Is the mode the same as the given mode?
     *
     * @param string $mode
     * @return bool
     */
    public function isMode(string $mode): bool
    {
        try {
            $mode = CrudModes::from($mode);
        } catch (\Exception $e) {
            return false;
        }

        return $this->mode === $mode;
    }
}
