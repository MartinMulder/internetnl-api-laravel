<?php
namespace InternetNL\Laravel\Tests;

use InternetNL\Laravel\Facades\Internetnl;
use InternetNL\Laravel\InternetnlServiceProvider;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{


    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return InternetNL\Laravel\InternetnlServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [InternetnlServiceProvider::class];
    }
    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Internetnl' => Internetnl::class,
        ];
    }
}
