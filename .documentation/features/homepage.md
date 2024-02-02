# Homepage Feature

Last updated: 2 Feb 2024

The Homepage feature provides a way to retrieve and set the homepage content.

## Usage

The feature is available as a facade or injection and is instantiated as a `singleton`.


## Service Contract

`app/Contracts/Homepage.php`

### Public Methods

- `getTitle(string $default = ''): string`
- `setTitle(string $value): void`
- `getTagline(string $default = ''): string`
- `setTagline(string $value): void`
- `getIntroduction(string $default = ''): string`
- `setIntroduction(string $value): void`
