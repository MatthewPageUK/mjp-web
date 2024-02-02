<?php

namespace App\Exceptions;

use Exception;

/**
 * Thrown by the Setting Service if the setting key does not exist.
 *
 */
class SettingNotFound extends Exception
{
    public function __construct(string $key, $code = 0)
    {
        parent::__construct("Settings :: Item for key '{$key}' not found.", $code);
    }
}
