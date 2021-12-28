# Laravel package for Fpdf

[![Latest Stable Version](https://poser.pugx.org/codedge/laravel-fpdf/v/stable?format=flat-square)](https://packagist.org/packages/codedge/laravel-fpdf)
[![Total Downloads](https://poser.pugx.org/codedge/laravel-fpdf/downloads?format=flat-square)](https://packagist.org/packages/codedge/laravel-fpdf)
[![](https://github.com/codedge/laravel-fpdf/workflows/Tests/badge.svg)](https://github.com/codedge/laravel-fpdf/actions)
[![StyleCI](https://styleci.io/repos/59506451/shield)](https://styleci.io/repos/59506451)
[![License](https://poser.pugx.org/codedge/laravel-fpdf/license?format=flat-square)](https://packagist.org/packages/codedge/laravel-fpdf)

Using [FPDF](http://www.fpdf.org/) made easy with Laravel. See [FPDF homepage](http://www.fpdf.org/) for more information about the usage.

## Installation using [Composer](https://getcomposer.org/)

```sh
composer require codedge/laravel-fpdf
```

## Configuration

Run  
`php artisan vendor:publish --provider="Codedge\Fpdf\FpdfServiceProvider" --tag=config`  
to publish the configuration file to `config/fpdf.php`.

## Usage

```php
// app/Http/routes.php | app/routes/web.php

Route::get('/', function (Codedge\Fpdf\Fpdf\Fpdf $fpdf) {

    $fpdf->AddPage();
    $fpdf->SetFont('Courier', 'B', 18);
    $fpdf->Cell(50, 25, 'Hello World!');
    $fpdf->Output();
    exit;

});
```

## Use in Laravel Vapor

If you want to use [Laravel Vapor](https://vapor.laravel.com) to host your application,
[a special header](https://docs.vapor.build/1.0/projects/development.html#binary-responses) needs to be attached to each response that FPDF returns to your browser.
To enable the use of this header, add the following environment variable to the Vapor environment file:

```dotenv
FPDF_VAPOR_HEADERS=true
```
