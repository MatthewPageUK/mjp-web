<?php

namespace App\Services;

use App\Exceptions\Settings\SettingNotFoundException;
use App\Models\Setting;
use Illuminate\Support\Collection;

/**
 * Service for managing settings.
 *
 */
class SettingService
{
    /**
     * All Settings from the database.
     *
     * @var Collection
     */
    public $settings;

    /**
     * Construct the service and load the settings
     * from the database.
     *
     */
    public function __construct()
    {
        $this->settings = $this->getSettings();
    }

    /**
     * Get all the Settings from the database.
     *
     * @return Collection
     */
    public function getSettings(): Collection
    {
        return Setting::all();
    }

    /**
     * Get a Setting by its key.
     *
     * @param string $key
     * @throws SettingNotFoundException
     * @return Setting
     */
    public function get(string $key): Setting
    {
        $setting = $this->settings->where('key', $key)->first();

        if (! $setting) {
            throw new SettingNotFoundException(
                sprintf('Setting not found for key %s', $key)
            );
        }

        return $setting;
     }

    /**
     * Get the value of the Setting.
     *
     * @param string $key      The setting to get
     * @return string
     */
    public function getValue($key): string
    {
        try {
            $setting = $this->get($key);
        } catch (SettingNotFoundException $e) {
            return '';
        }

        return $setting->value;
    }

    /**
     * Set a Setting value and save to the database.
     *
     * @param string $key       The setting to change
     * @param string $value     The new value
     * @return bool
     */
    public function setValue($key, $value = null): bool
    {
        try {
            $setting = $this->get($key);
        } catch (SettingNotFoundException $e) {
            return false;
        }

        $setting->value = $value;
        $setting->save();

        return true;
    }
}
