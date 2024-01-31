<?php

namespace App\Enums;

/**
 * Sort values for a book reading history.
 *
 */
enum BookReadingSort: string
{
    case Latest     = 'latest';
    case Oldest     = 'oldest';
    case Chapter    = 'chapter';
}
