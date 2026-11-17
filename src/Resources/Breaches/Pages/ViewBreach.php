<?php

namespace JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\Filament\GdprBreaches\Actions\BreachActions;
use JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\BreachResource;

class ViewBreach extends ViewRecord
{
    protected static string $resource = BreachResource::class;

    protected function getHeaderActions(): array
    {
        return [...BreachActions::all(), EditAction::make()];
    }
}
