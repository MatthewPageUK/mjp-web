# Console Command Traits

The MjpSetup trait provides a header method that displays a fancy header with the action being performed and the environment the command is being run in. It also provides a requireCleanDatabase method that checks if an admin user already exists in the database and displays an error message if it does, preventing the setup command from running on a non-clean database.

## Example

```php
$this->header('Setup');
```

```php
if (! $this->requireCleanDatabase()) {
    return;
}
```