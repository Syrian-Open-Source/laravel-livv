<?php

namespace SOS\LaravelLivv;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use SOS\LaravelLivv\Commands\InstallCommand;

class LaravelLivvServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-livv')
            ->hasCommand(InstallCommand::class);
    }
}
