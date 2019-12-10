# Laravel package for Fpdf

[![Latest Stable Version](https://poser.pugx.org/codedge/laravel-fpdf/v/stable?format=flat-square)](https://packagist.org/packages/codedge/laravel-fpdf)
[![Total Downloads](https://poser.pugx.org/codedge/laravel-fpdf/downloads?format=flat-square)](https://packagist.org/packages/codedge/laravel-fpdf)
[![StyleCI](https://styleci.io/repos/59506451/shield)](https://styleci.io/repos/59506451)
[![License](https://poser.pugx.org/codedge/laravel-fpdf/license?format=flat-square)](https://packagist.org/packages/codedge/laravel-fpdf)

This repository implements a simple [ServiceProvider](https://laravel.com/docs/master/providers)
that creates a singleton instance of the Fpdf PDF library - easily accessible via a [Facade](https://laravel.com/docs/master/facades) in [Laravel](https://laravel.com/).  

See [FPDF homepage](http://www.fpdf.org/) for more information about the usage.

## Installation using [Composer](https://getcomposer.org/)
```sh
$ composer require codedge/laravel-fpdf
```

## Usage

### Laravel >= 5.5
Enjoy the auto discovery feature. 

### Laravel <5.5
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
        // ...
        Codedge\Fpdf\FpdfServiceProvider::class, // [1]
    ],
    
    // ...
    
    'aliases' => [
        // ...
        'Fpdf' => Codedge\Fpdf\Facades\Fpdf::class, // [2]
]
```

Now you can use the facades in your application. 

## Configuration (optional)
Run   
`php artisan vendor:publish --provider="Codedge\Fpdf\FpdfServiceProvider" --tag=config`  
to publish the configuration file to `config/fpdf.php`.  
  
Open this file and enter the correct page settings, if you do not want the defaults.

## Basic example

If you want to use the facade you can see a basic example here:

```php
// app/Http/routes.php | app/routes/web.php

Route::get('/', function () {

    Fpdf::AddPage();
    Fpdf::SetFont('Courier', 'B', 18);
    Fpdf::Cell(50, 25, 'Hello World!');
    Fpdf::Output();

});
```

Of course you can also inject the singleton instance via dependency injection. See an example here:

```php
// app/Http/routes.php | app/routes/web.php

Route::get('/', function (Codedge\Fpdf\Fpdf\Fpdf $fpdf) {

    $fpdf->AddPage();
    $fpdf->SetFont('Courier', 'B', 18);
    $fpdf->Cell(50, 25, 'Hello World!');
    $fpdf->Output();

});
```

## Use in Laravel Vapor

If you want to use [Laravel Vapor](https://vapor.laravel.com) to host your application,
[a special header](https://docs.vapor.build/1.0/projects/development.html#binary-responses) needs to be attached to each response that FPDF returns to your browser.
To enable the use of this header, add the following environment variable to the Vapor environment file:

```dotenv
FPDF_VAPOR_HEADERS=true
```
