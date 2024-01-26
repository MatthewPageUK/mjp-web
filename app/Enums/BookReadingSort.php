<?php

namespace App\Enums;

enum BookReadingSort: string
{
    case Latest     = 'latest';
    case Oldest     = 'oldest';
    case Chapter    = 'chapter';
}
