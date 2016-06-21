# Laravel 5 package for Fpdf

[![Latest Stable Version](https://poser.pugx.org/codedge/laravel-fpdf/v/stable?format=flat-square)](https://packagist.org/packages/codedge/laravel-fpdf)
[![StyleCI](https://styleci.io/repos/59506451/shield)](https://styleci.io/repos/59506451)
[![License](https://poser.pugx.org/codedge/laravel-fpdf/license?format=flat-square)](https://packagist.org/packages/codedge/laravel-fpdf)

This repository implements a simple [ServiceProvider](https://laravel.com/docs/master/providers)
that creates a singleton instance of the Fpdf PDF library - easily accessible via a [Facade](https://laravel.com/docs/master/facades) in [Laravel 5](http://laravel.com).  
See [@Fpdf](http://www.fpdf.org/) for more information about the usage.

## Installation using [Composer](https://getcomposer.org/)
```sh
$ cd <YOUR LARAVEL PROJECT ROOT>
$ composer require codedge/laravel-fpdf:"dev-master"
```

This adds the codedge/laravel-fpdf package to your `composer.json` and downloads the project.

Next run   
`php artisan vendor:publish --provider="Codedge\Fpdf\FpdfServiceProvider" --tag=config`  
to publish the configuration file for the Fpdf PDF library to `config/fpdf.php`.  
  
**Hint**: Open this file and enter the correct page settings, if you do not want the defaults.

## Usage
To use the static interfaces (facades) you need to add the following lines to your `config/app.php`. The `[1]` is for
registering the service provider, the `[2]` are for specifying the facades:

```php
// config/app.php

return [

    //...
    
    'providers' => [
        // ...
        
        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        Codedge\Fpdf\FpdfServiceProvider::class, // [1]
    ],
    
    // ...
    
    'aliases' => [
        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        
        // ...
        
        'View' => Illuminate\Support\Facades\View::class,
        'Fpdf' => Codedge\Fpdf\Facades\Fpdf::class, // [2]

]
```

Now you can use the facades in your application. 

## Basic example

If you want to use the facade you can see a basic example here:

```php
// app/Http/routes.php

Route::get('/', function () {

    Fpdf::AddPage();
    Fpdf::SetFont('Courier', 'B', 18);
    Fpdf::Cell(50, 25, 'Hello World!');
    Fpdf::Output();

});
```

Of course you can also inject the singleton instance via dependency injection. See an example here:

```php
// app/Http/routes.php

Route::get('/', function (Codedge\Fpdf\Fpdf\FPDF $fpdf) {

    $fpdf->AddPage();
    $fpdf->SetFont('Courier', 'B', 18);
    $fpdf->Cell(50, 25, 'Hello World!');
    $fpdf->Output();

});
```