<?php

namespace Codedge\Fpdf\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Fpdf.
 */
class Fpdf extends Facade
{
    /**
     * Get the registered component name.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'fpdf';
    }
}
