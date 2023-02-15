# Laravel Service Pattern
A minimal package to implement Service Design Pattern in Laravel. It will also bind interface and service class in the ```AppServiceProvider.php```.

[![Latest Stable Version](http://poser.pugx.org/haroon-mahmood-4276/laravel-service-pattern/v)](https://packagist.org/packages/haroon-mahmood-4276/laravel-service-pattern) 
[![Total Downloads](http://poser.pugx.org/haroon-mahmood-4276/laravel-service-pattern/downloads)](https://packagist.org/packages/haroon-mahmood-4276/laravel-service-pattern) 
[![License](http://poser.pugx.org/haroon-mahmood-4276/laravel-service-pattern/license)](https://packagist.org/packages/haroon-mahmood-4276/laravel-service-pattern) 
[![PHP Version Require](http://poser.pugx.org/haroon-mahmood-4276/laravel-service-pattern/require/php)](https://packagist.org/packages/haroon-mahmood-4276/laravel-service-pattern)

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
This command is used to implement Service Design Pattern in Laravel Project. It make a service class with interface. ```{--do-not-bind}```(optional) is used to prevent service and interface binding in ```AppServiceProvider.php```. ```{--without-interface}```(optional) prevents the interface class to be created by this command.

```shell
php artisan make:service {name} {--do-not-bind} {--without-interface}
```

## How to use
```shell
protected $myInterface;

public function __construct(MyInterface $myInterface)
{
  $this->myInterface = $myInterface;
}
```

## Want to contribute
- Fork this repo.
- Contribute in it.
- Open a pull request.

## Security Vulnerabilities
If you discover a security vulnerability within package, please send an e-mail to Haroon Mahmood via haroon.mahmood.4276@gmail.com. All security vulnerabilities will be promptly addressed.

## License
This package is open-sourced software licensed under the MIT license.
