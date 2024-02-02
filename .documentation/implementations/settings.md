# Settings Implementation (Laravel Model)

## Overview

This implementation uses Laravel Models to store settings in the database.

When the Setting service is constructed all the settings are loaded from the database in to the `$settings` property of the service. This is done to minimize the number of database queries.

When a setting is updated or created the service will update the database and refresh the settings.

## Files

- `app/Models/Setting.php` - The model that represents a setting in the database.
- `app/Services/Settings.php` - The service implementation that handles the settings.
- `database/migrations/2023_02_22_202707_create_settings_table.php` - The migration that creates the settings table.
- `database/factories/SettingFactory.php` - The factory that creates fake settings for testing.
- `database/seeders/DatabaseSeeder.php` - ????.

## Unit Tests
