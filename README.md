
![logo-chrome](https://github.com/MatthewPageUK/mjp-web/assets/46349796/2aeedb5a-22a7-4c68-9ceb-68b5fde0df0d)

# MJP Web Site

This is the source code for my web site at (xxxxxx). I have shared it publically to allow clients to inspect my work, and maybe help some new developers along the way with ideas and useful code.

It's still a building site and mix of ideas atm .... pushing hard to get it done in the next (days/weeks/month)

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Clone the repo

```
git clone
```

## Using sail ?


## Install dependencies

```
composer install
```

```
npm install
```

## Create and edit a .env file

```
cp .env.example .env
```

Update your git token
```
GITHUB_TOKEN=
```

## Generate an app encryption key

```
php artisan key:generate
```

## Run migrations

```
php artisan migrate
```

## Setup default database seed

```
php artisan mjpweb:setup
```

or

```
php artisan mjpweb:demosetup
```

## Run the build

```
npm run build
```

## Run the server

```
sail up
```


# Documentation

- [Console Commands](.documentation/console/commands.md)
- [Console Command Traits](.documentation/console/traits.md)


