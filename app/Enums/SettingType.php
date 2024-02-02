<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

/**
 * Types of settings.
 */
enum SettingType: string implements HasLabel
{
    case Boolean    = 'boolean';
    case Date       = 'date';
    case DateTime   = 'datetime';
    case Email      = 'email';
    case Html       = 'html';
    case Markdown   = 'markdown';
    case String     = 'string';
    case Text       = 'text';
    case Url        = 'url';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Boolean  => 'Boolean',
            self::Date     => 'Date',
            self::DateTime => 'Date & Time',
            self::Email    => 'Email address',
            self::Html     => 'HTML',
            self::Markdown => 'Markdown',
            self::String   => 'String',
            self::Text     => 'Text',
            self::Url      => 'URL',
            default        => 'foo',
        };
    }
}