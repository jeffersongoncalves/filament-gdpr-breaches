<?php

namespace JeffersonGoncalves\Filament\GdprBreaches;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class GdprBreachesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-gdpr-breaches')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations();
    }
}
