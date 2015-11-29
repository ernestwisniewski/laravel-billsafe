<?php namespace ErnestWisniewski\LaravelBillsafe;

use Illuminate\Support\ServiceProvider;
use ErnestWisniewski\Billsafe\Sdk;

class BillsafeServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/billsafe_ini.php' => config_path('billsafe.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['Billsafe'] = $this->app->share(function ($app)
        {
            return new Billsafe();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('Billsafe');
    }

}
