<?php

declare(strict_types=1);

namespace Codedge\Fpdf\Test;

use Codedge\Fpdf\FpdfServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * @param  \Illuminate\Foundation\Application  $app
     * @return array|string[]
     */
    protected function getPackageProviders($app)
    {
        return [
            FpdfServiceProvider::class,
        ];
    }
}
