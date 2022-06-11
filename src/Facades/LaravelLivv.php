<?php

namespace SOS\LaravelLivv\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SOS\LaravelLivv\LaravelLivv
 */
class LaravelLivv extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-livv';
    }
}
