<?php

namespace App\Enums;

/**
 * Setting keys used for content on the homepage.
 */
enum HomepageSettingKey: string {

    case Name           = 'homepage_name';
    case Tagline        = 'homepage_tagline';
    case Introduction   = 'homepage_intro';

    /**
     * Get the type of setting.
     *
     * @return SettingType
     */
    public function type(): SettingType
    {
        return match ($this) {
            self::Name          => SettingType::String,
            self::Tagline       => SettingType::String,
            self::Introduction  => SettingType::Text,
        };
    }
}