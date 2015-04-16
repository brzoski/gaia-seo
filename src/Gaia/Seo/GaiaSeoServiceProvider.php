<?php namespace Gaia\Seo;

use Illuminate\Support\ServiceProvider;

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
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
       
    }

}