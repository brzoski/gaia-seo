<?php namespace Gaia\Seo;

use Illuminate\Support\ServiceProvider;
use Gaia\Seo\MetaTag;
use Gaia\Seo\MetaTagInterface;

class GaiaSeoServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //publish the views 
        $this->publishes([ __DIR__ .'/../../Views' => base_path('resources/views/') ]);
        //publish the database migrations and seeds
        $this->publishes([ __DIR__ .'/../../Database' => base_path('database/') ]);
        //Publish the models
        $this->publishes([ __DIR__ .'/../../Models' => base_path('app/Models/') ]);


        //config
        $this->publishes([__DIR__ . '/../../Config/metatag.php' => config_path('metatag.php')]);
        $this->mergeConfigFrom(__DIR__ . '/../../Config/metatag.php', 'metatag');        
        
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('metatag', function ($app) {
            return new MetaTag( $app['config']->get('metatag', []) );
        });

        $this->app->bind('Gaia\Seo\MetaTagInterface', 'Gaia\Seo\MetaTag');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
         return [];
    }

}