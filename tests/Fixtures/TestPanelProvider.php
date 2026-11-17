<?php

namespace JeffersonGoncalves\Filament\GdprBreaches\Tests\Fixtures;

use Filament\Panel;
use Filament\PanelProvider;
use JeffersonGoncalves\Filament\GdprBreaches\GdprBreachesPlugin;

class TestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->plugins([
                GdprBreachesPlugin::make(),
            ]);
    }
}
