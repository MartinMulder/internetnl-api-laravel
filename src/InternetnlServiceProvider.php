<?php
namespace Internetnl\Laravel;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class InternetnlServiceProvider extends ServiceProvider
{
    /**
     * Run service provider boot operations.
     *
     * @return void
     */
    public function boot()
    {
        $config = __DIR__.'/Config/config.php';
        $this->publishes([
            $config => config_path('internetnl.php'),
        ], 'internetnl');
        $this->mergeConfigFrom($config, 'internetnl');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind the InternetNL instance to the IoC
        $this->app->singleton('internetnl', function (Container $app) {
            $config = $app->make('config')->get('internetnl');
            // Verify configuration exists.
            if (is_null($config)) {
                $message = 'Internet.nl configuration could not be found. Try re-publishing using `php artisan vendor:publish --tag="internetnl"`.';
                throw new ConfigurationMissingException($message);
            }
            return $this->newInternetNL();
        });
        // Bind the InternetNL contract to the InternetNL object
        // in the IoC for dependency injection.
        $this->app->singleton(InternetNLInterface::class, 'internetnl');
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['internetnl'];
    }
    /**
     * Returns a new InternetNL Api instance.
     *
     * @return InternetNL
     */
    protected function newInternetNL()
    {
	\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
        return new MartinMulder\InternetNL\Api(Config::get('internetnl.connection.username'), Config::get('internetnl.connection.password'));
    }
}
