[![Laravel](https://img.shields.io/badge/Laravel-4.0-orange.svg?style=flat-square)](http://laravel.com)
[![Laravel](https://img.shields.io/badge/Laravel-5.0-orange.svg?style=flat-square)](http://laravel.com)
[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://tldrlegal.com/license/mit-license)

#Menu

This is a package for the Laravel framework, it allows for a specified set of menu to be overridden in the database by the user of the site

## Installation

### Laravel 5

Using Composer, edit your `composer.json` file to require `devfactory/media`.

    "require": {
      "devfactory/menu": "1.0.*"
    }

Then from the terminal run

    composer update

Then in your `app/config/app.php` file register the service provider:

```php
'Devfactory\Menu\MenuServiceProvider',
```
and the Facade:

```php
'MenuAdmin' => 'Devfactory\Menu\Facades\Menu',
```

From within the the laravel folder of your project, run:

    php artisan vendor:publish

Run the migration to create the DB table:

    php artisan migrate

You have to add the Controller to your routes.php, so that you can set your own url/filters.

```php
Route::group(array('before' => 'admin-auth'), function() {
  Route::controller('menu', '\Devfactory\Menu\Controllers\MenuController');
});
```

To show the menu

```php
  {!! MenuAdmin::show('nav menu'); !!}
```
