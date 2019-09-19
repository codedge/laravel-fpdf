<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default configuration for FPDF
    |--------------------------------------------------------------------------
    |
    | Specify the default values for creating a PDF with FPDF
    |
    */

    'orientation'       => 'P',
    'unit'              => 'mm',
    'size'              => 'A4',

    /*
    |--------------------------------------------------------------------------
    | With Laravel Vapor hosting
    |--------------------------------------------------------------------------
    |
    | If the application is to be hosted in the Laravel Vapor hosting platform,
    | a special header needs to be attached to each download response.
    |
    */
    'useVaporHeaders'  => env('FPDF_VAPOR_HEADERS', false),

];
