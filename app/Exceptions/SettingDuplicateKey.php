<?php

namespace App\Exceptions;

use Exception;

/**
 * Thrown by the Setting Service if the setting key does not exist.
 *
 */
class SettingDuplicateKey extends Exception
{
    public function __construct(string $key, $code = 0)
    {
        parent::__construct("Settings :: Can not create duplicate '{$key}'.", $code);
    }
}
