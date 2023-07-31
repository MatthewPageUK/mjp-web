<?php

namespace App\Exceptions\Skills;

use Exception;

/**
 * Thrown from the SkillService if the skill group
 * being requested does not exist.
 *
 */
class SkillGroupNotFound extends Exception
{
    protected string $slug;

    public function __construct(string $slug)
    {
        parent::__construct();
        $this->slug = $slug;
    }

}
