# Console Commands

## Setup

Setup the application for first use. Seeds the admin user if none exist. Seeds essential settings and content placeholders. Requires a clean database before running.

```bash
php artisan mjpweb:setup
```

## Reset

Reset the application, deleting all user data, admins and files. Deletes all data!

```bash
php artisan mjpweb:reset
```

## Demo setup

Sets up the application with seeded demo data. Useful for running locally in development. Requires a clean database before running.

```bash
php artisan mjpweb:demosetup
```
## Make skill stats

Generates skill stats. Shoud be called regularly to keep the stats up to date.

```bash
php artisan mjpweb:make-skill-stats
```
