<?php

namespace SyrianOpenSource\LaravelLivv\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SyrianOpenSource\LaravelLivv\LaravelLivv
 */
class LaravelLivv extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-livv';
    }
}
