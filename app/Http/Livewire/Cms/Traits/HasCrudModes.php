<?php

namespace App\Http\Livewire\Cms\Traits;

trait HasCrudModes
{
    /**
     * Current mode
     *
     * @var string
     */
    public string $mode = 'read';

    /**
     * Set the mode
     *
     * @param string $mode
     * @return void
     */
    public function setMode(string $mode): void
    {
        $this->mode = $mode;
    }

    /**
     * Get the mode
     *
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * Is the mode
     *
     * @param string $mode
     * @return bool
     */
    public function isMode(string $mode): bool
    {
        return $this->mode === $mode;
    }

}