<?php

namespace App\Models\Traits;

use App\Models\Image;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Trait for models that can be used as Journal entries.
 *
 */
trait IsJournable
{
    public string $journalDateField = 'created_at';

    public array $journalRelations = [
        'skills'
    ];
}
