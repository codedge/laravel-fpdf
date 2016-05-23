<?php namespace Codedge\Fpdf\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Fpdf
 *
 * @package Codedge\Fpdf\Facades
 */
class Fpdf extends Facade
{
    /**
     * Get the registered component name
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'fpdf';
    }
}