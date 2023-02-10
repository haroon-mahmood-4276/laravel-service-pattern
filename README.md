# Laravel Service Pattern
A minimal package to implement Service Design Pattern in Laravel.

## Installation
```shell
composer require haroon-mahmood-4276/laravel-service-pattern
```

Laravel uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

If laravel's auto-discovery doesn't work, add following lines in ```providers``` array in ```config/app.php```
```shell
/*
* Package Service Providers...
*/
...

HaroonMahmood4276\LaravelServicePattern\PatternServiceProvider::class,
...
```

## Command
This command is used to implement Service Design Pattern in Laravel Project. It make a service class with interface. ```{--do-not-bind}``` is used to prevent service and interface binding in AppServiceProvider.php. ```{--without-interface}``` prevents the interface class to be created by this command.

```shell
php artisan make:service {name} {--do-not-bind} {--without-interface}
```

## Want to contribute
- Fork this repo.
- Contribute in it.
- Open a pull request.

## Security Vulnerabilities
If you discover a security vulnerability within package, please send an e-mail to Haroon Mahmood via haroon.mahmood.4276@gmail.com. All security vulnerabilities will be promptly addressed.

## License
This package is open-sourced software licensed under the MIT license.
