# Laravel commands history
A simple Laravel package to store every artisan command history with arguments and options in database.

[![Packagist License](https://poser.pugx.org/haroon-mahmood-4276/laravel-commands-history/license.png)](http://choosealicense.com/licenses/mit/)
[![Latest Stable Version](https://poser.pugx.org/haroon-mahmood-4276/laravel-commands-history/version.png)](https://packagist.org/packages/haroon-mahmood-4276/laravel-commands-history)
[![Total Downloads](http://poser.pugx.org/haroon-mahmood-4276/laravel-commands-history/downloads)](https://packagist.org/packages/haroon-mahmood-4276/laravel-commands-history)
[![PHP Version Require](http://poser.pugx.org/haroon-mahmood-4276/laravel-commands-history/require/php)](https://packagist.org/packages/haroon-mahmood-4276/laravel-commands-history)

## Installation
```shell
composer require haroon-mahmood-4276/laravel-commands-history
```

Laravel uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

If laravel's auto-discovery doesn't work, add following lines in ```providers``` array in ```config/app.php```
```shell
/*
* Package Service Providers...
*/
...

HaroonMahmood4276\LaravelCommandsHistory\CommandHistoryServiceProvider::class,
HaroonMahmood4276\LaravelCommandsHistory\CommandEventServiceProvider::class,
...
```

## Migration
```shell
php artisan migrate
```

## Want to contribute
- Fork this repo.
- Contribute in it.
- Open a pull request.

## Security Vulnerabilities
If you discover a security vulnerability within package, please send an e-mail to Haroon Mahmood via haroon.mahmood.4276@gmail.com. All security vulnerabilities will be promptly addressed.

## License
This package is open-sourced software licensed under the MIT license.
