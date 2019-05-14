<?php
namespace InternetNL\Laravel\Facades;
use Illuminate\Support\Facades\Facade;

class Internetnl extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'internetnl';
    }
}
