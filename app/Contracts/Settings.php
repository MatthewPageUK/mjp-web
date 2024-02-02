<?php

namespace App\Contracts;

use App\Enums\SettingType;
use App\Exceptions\SettingNotFound;

interface Settings
{
    /**
     * Get the value of a setting from the key.
     *
     * @param  string $key
     * @throws SettingNotFound
     * @return string
     */
    public function getValue(string $key): string;

    /**
     * Get the value of a setting from the key
     * or return the default value provided.
     *
     * @param  string $key
     * @return string
     */
    public function tryGetValue(string $key, string $default = ''): string;

    /**
     * Does the setting exist?
     *
     * @param  string $key
     * @return string
     */
    public function exists(string $key): bool;

    /**
     * Create a new setting.
     *
     * @param  string       $key
     * @param  SettingType  $type
     * @param  string       $value
     * @return void
     */
    public function create(string $key, SettingType $type, string $value = ''): void;

    /**
     * Set the value of a setting.
     *
     * @param  string $key
     * @param  string $value
     * @param  bool $createIfKeyDoesntExist
     * @param  SettingType $createType
     * @throws SettingNotFound
     * @return void
     */
    public function setValue(
        string $key,
        string $value = '',
        bool $createIfKeyDoesntExist = false,
        SettingType $createType = SettingType::String
    ): void;
}
