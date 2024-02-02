<?php

namespace Tests\Feature;

use App\Contracts\Settings;
use App\Enums\SettingType;
use App\Exceptions\SettingDuplicateKey;
use App\Exceptions\SettingNotFound;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Settings Feature tests.
 *
 * These test the Settings service public methods.
 *
 */
class SettingsTest extends TestCase
{
    use RefreshDatabase;

    protected Settings $settings;

    public function setUp(): void
    {
        parent::setUp();
        $this->settings = app(Settings::class);
    }

    public function test_setting_can_be_created(): void
    {
        $this->settings->create('test_setting_can_be_created', SettingType::String, 'abcdefg');
        $this->assertTrue($this->settings->exists('test_setting_can_be_created'));
    }

    public function test_exception_is_thrown_if_duplicate_key_created(): void
    {
        $this->settings->create('test_exception_is_thrown_if_duplicate_key_created', SettingType::String);
        $this->expectException(SettingDuplicateKey::class);
        $this->settings->create('test_exception_is_thrown_if_duplicate_key_created', SettingType::String);
    }

    public function test_setting_value_can_be_retrieved(): void
    {
        $this->settings->create('test_setting_value_can_be_retrieved', SettingType::String, 'abcdefg');
        $this->assertEquals('abcdefg', $this->settings->getValue('test_setting_value_can_be_retrieved'));
    }

    public function test_setting_value_can_be_updated(): void
    {
        $this->settings->create('test_setting_value_can_be_updated', SettingType::String, 'abcdefg');
        $this->settings->setValue('test_setting_value_can_be_updated', '123456');
        $this->assertEquals('123456', $this->settings->getValue('test_setting_value_can_be_updated'));
    }

    public function test_exception_is_thrown_if_key_not_found(): void
    {
        $this->expectException(SettingNotFound::class);
        $this->settings->getValue('test_exception_is_thrown_if_key_not_found');
    }

    public function test_new_key_is_created_if_set_value_key_is_not_found_and_create_is_true(): void
    {
        $this->settings->setValue('test_new_key_is_created_if_set_value_key_is_not_found_and_create_is_true', '123456', true, SettingType::Text);
        $this->assertEquals('123456', $this->settings->getValue('test_new_key_is_created_if_set_value_key_is_not_found_and_create_is_true'));
    }

    public function test_default_value_is_returned_if_key_not_found(): void
    {
        $this->assertEquals('abcdefg', $this->settings->tryGetValue('test_default_value_is_returned_if_key_not_found', 'abcdefg'));
    }
}
