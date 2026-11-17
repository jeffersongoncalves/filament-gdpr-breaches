<?php

namespace JeffersonGoncalves\Filament\GdprBreaches;

use JeffersonGoncalves\FilamentPluginCore\BasePackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class GdprBreachesServiceProvider extends BasePackageServiceProvider
{
    public static string $name = 'filament-gdpr-breaches';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasTranslations();
    }
}
