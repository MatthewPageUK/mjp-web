<?php

namespace App\Services\Ui;

use App\Contracts\Homepage as HomepageContract;
use App\Contracts\Settings;
use App\Enums\HomepageSettingKey;

/**
 * Homepage Service Implementation.
 *
 * This service uses the Settings Feature to store and retrieve homepage content.
 */
class Homepage implements HomepageContract
{
    /**
     * Contract Implementation
     */
    public function getName(string $default = ''): string
    {
        return $this->settings->tryGetValue(HomepageSettingKey::Name->value, $default);
    }

    public function setName(string $value): void
    {
        $this->settings->setValue(HomepageSettingKey::Name->value, $value, true, HomepageSettingKey::Name->type());
    }

    public function getTagline(string $default = ''): string
    {
        return $this->settings->tryGetValue(HomepageSettingKey::Tagline->value, $default);
    }

    public function setTagline(string $value): void
    {
        $this->settings->setValue(HomepageSettingKey::Tagline->value, $value, true, HomepageSettingKey::Tagline->type());
    }

    public function getIntroduction(string $default = ''): string
    {
        return $this->settings->tryGetValue(HomepageSettingKey::Introduction->value, $default);
    }

    public function setIntroduction(string $value): void
    {
        $this->settings->setValue(HomepageSettingKey::Introduction->value, $value, true, HomepageSettingKey::Introduction->type());
    }

    /**
     * Create a new instance of the Homepage service.
     *
     * @param Settings $settings
     */
    public function __construct(protected Settings $settings)
    {
        //
    }
}
