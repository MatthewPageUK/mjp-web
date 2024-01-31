<?php

namespace App\Enums;

/**
 * Filter values for the library books list.
 *
 */
enum LibraryBookFilter: string
{
    case All        = 'all';
    case Unfinished = 'unfinished';
    case Unread     = 'unread';
    case Recent     = 'recent';
}
