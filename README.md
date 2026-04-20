# Tutorials

[![License](https://poser.pugx.org/laravel-enso/tutorials/license)](LICENSE)
[![Stable](https://poser.pugx.org/laravel-enso/tutorials/version)](https://packagist.org/packages/laravel-enso/tutorials)
[![Downloads](https://poser.pugx.org/laravel-enso/tutorials/downloads)](https://packagist.org/packages/laravel-enso/tutorials)
[![PHP](https://img.shields.io/badge/php-8.2%2B-777bb4.svg)](composer.json)
[![Issues](https://img.shields.io/github/issues/laravel-enso/tutorials.svg)](https://github.com/laravel-enso/tutorials/issues)
[![Merge Requests](https://img.shields.io/github/issues-pr/laravel-enso/tutorials.svg)](https://github.com/laravel-enso/tutorials/pulls)

## Description

Tutorials manages in-app guidance content for Laravel Enso.

The package stores tutorial records, exposes create/edit/table/export endpoints, serves a runtime `load` endpoint for frontend consumers, and classifies tutorials by placement through an enum.

## Installation

Install the package:

```bash
composer require laravel-enso/tutorials
```

Run the migrations:

```bash
php artisan migrate
```

## Features

- CRUD backend with form and table builders.
- Runtime loader endpoint for frontend tutorial rendering.
- Placement enum for deciding where tutorials are shown.
- JSON resources for edit/show payloads.

## Usage

Routes are registered under:

- prefix: `api/system/tutorials`
- name prefix: `system.tutorials.`
- middleware: `api`, `auth`, `core`

Endpoints:

- `GET create`
- `POST /`
- `GET {tutorial}/edit`
- `PATCH {tutorial}`
- `DELETE {tutorial}`
- `GET initTable`
- `GET tableData`
- `GET exportExcel`
- `GET load`

Key model:

- `LaravelEnso\Tutorials\Models\Tutorial`

Enum:

- `LaravelEnso\Tutorials\Enums\Placement`

## API

This package exposes its backend integration through the routes, controllers, services, jobs, and configuration points referenced in the usage examples above.

Consumers should rely on the published config keys, documented route groups, and explicit service classes shown in the examples. Internal helper classes, listeners, casts, and background jobs are implementation details unless the README calls them out as extension points.

## Depends On

Required Enso packages:

- [`laravel-enso/core`](https://docs.laravel-enso.com/backend/core.html) [↗](https://github.com/laravel-enso/core)
- [`laravel-enso/dynamic-methods`](https://docs.laravel-enso.com/backend/dynamic-methods.html) [↗](https://github.com/laravel-enso/dynamic-methods)
- [`laravel-enso/enums`](https://docs.laravel-enso.com/backend/enums.html) [↗](https://github.com/laravel-enso/enums)
- [`laravel-enso/forms`](https://docs.laravel-enso.com/backend/forms.html) [↗](https://github.com/laravel-enso/forms)
- [`laravel-enso/helpers`](https://docs.laravel-enso.com/backend/helpers.html) [↗](https://github.com/laravel-enso/helpers)
- [`laravel-enso/migrator`](https://docs.laravel-enso.com/backend/migrator.html) [↗](https://github.com/laravel-enso/migrator)
- [`laravel-enso/permissions`](https://docs.laravel-enso.com/backend/permissions.html) [↗](https://github.com/laravel-enso/permissions)
- [`laravel-enso/tables`](https://docs.laravel-enso.com/backend/tables.html) [↗](https://github.com/laravel-enso/tables)

Companion frontend package:

- [`@enso-ui/tutorials`](https://docs.laravel-enso.com/frontend/tutorials.html) [↗](https://github.com/enso-ui/tutorials)

## Contributions

are welcome. Pull requests are great, but issues are good too.

Thank you to all the people who already contributed to Enso!
