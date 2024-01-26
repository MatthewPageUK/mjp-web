<?php

namespace App\Enums;

enum LibraryBookFilter: string
{
    case All        = 'all';
    case Unfinished = 'unfinished';
    case Unread     = 'unread';
    case Recent     = 'recent';
}
