<?php

namespace JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\BreachResource;
use JeffersonGoncalves\GdprBreaches\BreachManager;

class CreateBreach extends CreateRecord
{
    protected static string $resource = BreachResource::class;

    /**
     * Open through the manager: it sets the business-day deadline and fires BreachOpened.
     *
     * @param  array<string, mixed>  $data
     */
    protected function handleRecordCreation(array $data): Model
    {
        return app(BreachManager::class)->open(
            $data['title'],
            Carbon::parse($data['discovered_at']),
            Arr::except($data, ['title', 'discovered_at']),
        );
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }
}
