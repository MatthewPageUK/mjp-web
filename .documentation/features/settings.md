# Settings Feature Documentation

- See also [Settings Implementation Documentation](../implementations/settings.md)
- Last updated: 2 Feb 2024

The Settings feature provides a way to retrieve application settings and miscellaneous data that can be edited by the Admin and is needed for the front-end of the application.

Types of items we may want to retrieve :

- API Keys
- Email Addresses
- Telephone and contact information
- Page Titles
- Page Content
- Social Media Links
- Miscellaneous Data
- Theme or Style Settings

## Data Types

Setting types are defined in `app/Enums/SettingType.php` and are considered to be part of the public contract.

- String - A simple string value
- Text - A longer text value
- more.... @todo

## Usage

The feature is available as a facade or injection and is instantiated as a `singleton`.

```php
use App\Facades\Settings;

$value = Settings::tryGetValue('key', 'default');
```

```php
use App\Contracts\Settings;
use App\Exceptions\SettingNotFound;

class MyClass
{
    public function __construct(Settings $settings)
    {
        try {
            $value = $settings->getValue('key');
        } catch (SettingNotFound $e) {
            ...
        }
    }
}
```

## Service Contract

`app/Contracts/Settings.php`

### Public Methods

- `getValue(string $key): string`
- `tryGetValue(string $key, string $default = ''): string`
- `has(string $key): bool`
- `create(string $key, SettingType $type, string $value = ''): void`
- `setValue(string $key, string $value): void`

## Exceptions

- `App\Exceptions\SettingNotFound`

## Enums

- `App\Enums\SettingType`

## Feature Tests

- `tests/Feature/SettingsTest.php`
