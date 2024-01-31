<?php

namespace App\Enums;

/**
 * Site sections.
 *
 */
enum Section: string
{
    case Home       = 'home';
    case Skills     = 'skills';
    case Work       = 'work';
    case Projects   = 'projects';
    case Demos      = 'demos';
    case Journal    = 'journal';
    case Library    = 'library';

    public function getUiIcon(): ?string
    {
        return match($this) {
            self::Skills    => 'construction',
            self::Work      => 'public',
            self::Projects  => 'rocket_launch',
            self::Demos     => 'smart_toy',
            self::Journal   => 'draw',
            self::Library   => 'local_library',
            default         => 'home',
        };
    }
}

