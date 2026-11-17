<?php

namespace JeffersonGoncalves\Filament\GdprBreaches\Support;

use Illuminate\Support\Carbon;
use JeffersonGoncalves\GdprBreaches\Enums\Risk;
use JeffersonGoncalves\GdprBreaches\Models\Breach;

class Labels
{
    /**
     * @return array<string, string>
     */
    public static function risks(): array
    {
        return collect(Risk::cases())->mapWithKeys(fn (Risk $risk): array => [$risk->value => static::risk($risk->value)])->all();
    }

    public static function risk(?string $risk): string
    {
        return __('filament-gdpr-breaches::filament-gdpr-breaches.risk.'.($risk ?? 'pending'));
    }

    public static function riskColor(?string $risk): string
    {
        return match ($risk) {
            Risk::High->value => 'danger',
            Risk::Unlikely->value => 'success',
            default => 'warning',
        };
    }

    public static function status(Breach $breach): string
    {
        return match (true) {
            $breach->closed_at !== null => 'closed',
            $breach->isOverdue() => 'overdue',
            $breach->owesAuthorityNotice() || $breach->owesSubjectNotice() || $breach->owesFurtherInformation() => 'pending',
            default => 'open',
        };
    }

    public static function statusColor(string $status): string
    {
        return match ($status) {
            'closed' => 'gray',
            'overdue' => 'danger',
            'pending' => 'warning',
            default => 'info',
        };
    }

    public static function date(mixed $value): Carbon
    {
        return Carbon::parse($value);
    }
}
