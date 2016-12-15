# Laravel User Command

[![Packagist](https://img.shields.io/packagist/v/rap2hpoutre/create-user-command.svg)]()
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

Create a user with artisan command.
## Install
Install via composer
```
composer require rap2hpoutre/create-user-command
```
Add the Create User command to `app/Console/Kernel.php` in protected `$commands` array
```php
\Rap2hpoutre\CreateUser\Command::class,
```

## Usage

![demo](demo.gif)

## Why

Sometimes, I need to manually create user (with no web interface).
