<?php namespace Codedge\Fpdf;

use Illuminate\Support\ServiceProvider;

class FpdfServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/fpdf.php' => config_path('fpdf.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/config/fpdf.php';
        $this->mergeConfigFrom($configPath, 'fpdf');

        $this->app->call( [ $this, 'registerFpdf' ] );
    }

    /**
     * Register the Fpdf instance
     *
     * @return void
     */
    public function registerFpdf()
    {
        $this->app->singleton('fpdf', function()
        {
            return new Fpdf\Fpdf(
                config('fpdf.orientation'), config('fpdf.unit'), config('fpdf.size')
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['fpdf'];
    }
}