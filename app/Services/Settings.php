<?php

namespace App\Services;

use App\Contracts\Settings as SettingsContract;
use App\Enums\SettingType;
use App\Exceptions\SettingDuplicateKey;
use App\Exceptions\SettingNotFound;
use App\Models\Setting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

/**
 * Settings Feature Implementation.
 *
 * This imlementation uses Laravel Models to store and retrieve settings
 * from the database. Settings are pre-loaded to reduce DB queries.
 *
 */
class Settings implements SettingsContract
{
    /**
     * Contract Implementation
     */
    public function getValue(string $key): string
    {
        return $this->get($key)->value;
    }

    public function tryGetValue(string $key, string $default = ''): string
    {
        try {
            return $this->get($key)->value;

        } catch (SettingNotFound $e) {
            Log::warning($e->getMessage());
            return $default;
        }
    }

    public function exists(string $key): bool
    {
        try {
            $this->get($key);
        } catch (SettingNotFound $e) {
            return false;
        }

        return true;
    }

    public function setValue(
        string $key,
        string $value = '',
        bool $createIfKeyDoesntExist = false,
        SettingType $createType = SettingType::String
    ): void {

        try {
            $setting = $this->get($key);

        } catch (SettingNotFound $e) {

            if ($createIfKeyDoesntExist) {
                $this->create($key, $createType, $value);
                return;
            }
            throw $e;
        }

        $setting->value = $value;
        $setting->save();

        $this->loadSettings();
    }

    public function create(string $key, SettingType $type, string $value = ''): void
    {
        if ($this->exists($key)) {
            throw new SettingDuplicateKey($key);
        }

        Setting::create([
            'key' => $key,
            'type' => $type,
            'value' => $value,
        ]);

        $this->loadSettings();
    }

    /**
     * All Settings from the database.
     *
     * @var Collection
     */
    protected Collection $settings;

    /**
     * Construct the service and load the settings
     * from the database.
     *
     */
    public function __construct()
    {
        $this->loadSettings();
    }

    /**
     * Load the settings from the database.
     *
     * @return void
     */
    protected function loadSettings(): void
    {
        $this->settings = Setting::all();
    }

    /**
     * Get a Setting by its key.
     *
     * @param string $key
     * @throws SettingNotFound
     * @return Setting
     */
    protected function get(string $key): Setting
    {
        $setting = $this->settings->firstWhere('key', $key);

        if (! $setting) {
            throw new SettingNotFound($key);
        }

        return $setting;
    }

}
