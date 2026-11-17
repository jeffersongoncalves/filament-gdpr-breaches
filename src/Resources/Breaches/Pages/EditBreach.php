<?php

namespace JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\Pages;

use Filament\Resources\Pages\EditRecord;
use JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\BreachResource;

/**
 * Edits the description fields only. The discovery date is locked: the legal deadline is counted from it.
 */
class EditBreach extends EditRecord
{
    protected static string $resource = BreachResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }
}
