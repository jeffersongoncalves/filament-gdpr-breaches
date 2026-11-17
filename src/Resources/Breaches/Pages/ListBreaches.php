<?php

namespace JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\BreachResource;

class ListBreaches extends ListRecords
{
    protected static string $resource = BreachResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
