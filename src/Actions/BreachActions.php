<?php

namespace JeffersonGoncalves\Filament\GdprBreaches\Actions;

use Filament\Actions\Action;
use Filament\Actions\MountableAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action as TableAction;
use JeffersonGoncalves\Filament\GdprBreaches\Support\Labels;
use JeffersonGoncalves\GdprBreaches\BreachManager;
use JeffersonGoncalves\GdprBreaches\Enums\Risk;
use JeffersonGoncalves\GdprBreaches\Models\Breach;
use LogicException;

/**
 * Row and view-page actions: each one is a thin call to laravel-gdpr-breaches' BreachManager.
 */
class BreachActions
{
    /**
     * @param  class-string<Action|TableAction>  $class
     * @return list<Action|TableAction>
     */
    public static function all(string $class = Action::class): array
    {
        return [static::assess($class), static::notifyAuthority($class), static::furtherInformation($class), static::notifySubjects($class), static::skipSubjectNotice($class), static::close($class)];
    }

    public static function assess(string $class = Action::class): Action|TableAction
    {
        return $class::make('assess')
            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.actions.assess.label'))
            ->icon('heroicon-o-scale')
            ->color('warning')
            ->visible(fn (Breach $record): bool => $record->closed_at === null)
            ->modalDescription(__('filament-gdpr-breaches::filament-gdpr-breaches.actions.assess.description'))
            ->fillForm(fn (Breach $record): array => ['risk' => $record->risk?->value, 'measures' => $record->measures])
            ->form([
                Select::make('risk')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.risk'))
                    ->options(Labels::risks())
                    ->required(),
                Textarea::make('measures')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.measures')),
            ])
            ->action(function (Breach $record, array $data): void {
                app(BreachManager::class)->assess($record, Risk::from($data['risk']), $data['measures'] ?? null);
                static::done('assess');
            });
    }

    public static function notifyAuthority(string $class = Action::class): Action|TableAction
    {
        return $class::make('notifyAuthority')
            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.actions.notify_authority.label'))
            ->icon('heroicon-o-building-library')
            ->color('info')
            ->visible(fn (Breach $record): bool => $record->owesAuthorityNotice())
            ->form([
                TextInput::make('reference')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.authority_reference')),
                DateTimePicker::make('at')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.notified_at'))
                    ->default(now())
                    ->required(),
                Textarea::make('delay_reason')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.delay_reason'))
                    ->helperText(__('filament-gdpr-breaches::filament-gdpr-breaches.help.delay_reason')),
                Toggle::make('phased')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.phased'))
                    ->helperText(__('filament-gdpr-breaches::filament-gdpr-breaches.help.phased')),
            ])
            ->action(function (Breach $record, array $data, MountableAction $action): void {
                try {
                    app(BreachManager::class)->notifyAuthority(
                        $record,
                        $data['reference'] ?? null,
                        Labels::date($data['at']),
                        filled($data['delay_reason'] ?? null) ? $data['delay_reason'] : null,
                        (bool) ($data['phased'] ?? false),
                    );
                } catch (LogicException $e) {
                    Notification::make()->danger()->title($e->getMessage())->send();
                    $action->halt();

                    return;
                }

                static::done('notify_authority');
            });
    }

    public static function furtherInformation(string $class = Action::class): Action|TableAction
    {
        return $class::make('furtherInformation')
            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.actions.further_information.label'))
            ->icon('heroicon-o-document-plus')
            ->color('info')
            ->visible(fn (Breach $record): bool => $record->owesFurtherInformation())
            ->form([
                DateTimePicker::make('at')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.further_information_at'))
                    ->default(now())
                    ->required(),
            ])
            ->action(function (Breach $record, array $data): void {
                app(BreachManager::class)->sendFurtherInformation($record, Labels::date($data['at']));
                static::done('further_information');
            });
    }

    public static function notifySubjects(string $class = Action::class): Action|TableAction
    {
        return $class::make('notifySubjects')
            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.actions.notify_subjects.label'))
            ->icon('heroicon-o-envelope')
            ->color('info')
            ->visible(fn (Breach $record): bool => $record->owesSubjectNotice())
            ->form([
                DateTimePicker::make('at')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.notified_at'))
                    ->default(now())
                    ->required(),
            ])
            ->action(function (Breach $record, array $data): void {
                app(BreachManager::class)->notifySubjects($record, Labels::date($data['at']));
                static::done('notify_subjects');
            });
    }

    public static function skipSubjectNotice(string $class = Action::class): Action|TableAction
    {
        return $class::make('skipSubjectNotice')
            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.actions.skip_subject_notice.label'))
            ->icon('heroicon-o-shield-check')
            ->color('gray')
            ->visible(fn (Breach $record): bool => $record->owesSubjectNotice())
            ->modalDescription(__('filament-gdpr-breaches::filament-gdpr-breaches.actions.skip_subject_notice.description'))
            ->form([
                Textarea::make('reason')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.no_subject_notice_reason'))
                    ->required(),
            ])
            ->action(function (Breach $record, array $data): void {
                app(BreachManager::class)->skipSubjectNotice($record, $data['reason']);
                static::done('skip_subject_notice');
            });
    }

    public static function close(string $class = Action::class): Action|TableAction
    {
        return $class::make('close')
            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.actions.close.label'))
            ->icon('heroicon-o-check-circle')
            ->color('success')
            ->visible(fn (Breach $record): bool => $record->closed_at === null && $record->risk !== null)
            ->fillForm(fn (Breach $record): array => ['measures' => $record->measures])
            ->form([
                Textarea::make('measures')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.measures'))
                    ->required(),
            ])
            ->action(function (Breach $record, array $data): void {
                app(BreachManager::class)->close($record, $data['measures']);
                static::done('close');
            });
    }

    protected static function done(string $action): void
    {
        Notification::make()->success()->title(__("filament-gdpr-breaches::filament-gdpr-breaches.actions.{$action}.success"))->send();
    }
}
