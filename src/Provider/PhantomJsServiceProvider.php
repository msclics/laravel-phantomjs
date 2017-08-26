<?php

namespace MSClics\PhantomJs\Provider;

use JonnyW\PhantomJs\Client;
use JonnyW\PhantomJs\DependencyInjection\ServiceContainer;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class PhantomJsServiceProvider extends ServiceProvider
{
    /**
     * Publish config file
     */
    public function boot()
    {
        $this->publishes([ __DIR__ . '/../../config.php' => config_path( 'phantomjs.php' ) ]);
    }

    /**
     * Register package to our project
     */
    public function register()
    {
        $this->app->singleton('phantomjsclient', function(){

            $serviceContainer = $this->getServiceContainer();

            return new Client(
                $serviceContainer->get('engine'),
                $serviceContainer->get('procedure_loader'),
                $serviceContainer->get('procedure_compiler'),
                $serviceContainer->get('message_factory')
            );
        });
    }

    /**
     * Get engine instance
     */
    protected function getEngine()
    {
        $engine = app('\JonnyW\PhantomJs\Engine');

        if(file_exists(config_path('phantomjs.php'))){
            $config = config('phantomjs');

            if(! empty($config['binary_path']) && ! is_null($config['binary_path'])){
                $engine->setPath($config['binary_path']);
            }
        }

        return $engine;
    }

    /**
     * Get Service container instance
     */
    protected function getServiceContainer()
    {
        $serviceContainer = ServiceContainer::getInstance();

        $serviceContainer->set('engine', $this->getEngine());

        return $serviceContainer;
    }
}
