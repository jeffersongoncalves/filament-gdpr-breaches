<?php

namespace JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action as TableAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use JeffersonGoncalves\Filament\GdprBreaches\Actions\BreachActions;
use JeffersonGoncalves\Filament\GdprBreaches\GdprBreachesPlugin;
use JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\Pages\CreateBreach;
use JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\Pages\EditBreach;
use JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\Pages\ListBreaches;
use JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\Pages\ViewBreach;
use JeffersonGoncalves\Filament\GdprBreaches\Support\Labels;
use JeffersonGoncalves\GdprBreaches\Models\Breach;

class BreachResource extends Resource
{
    protected static ?string $model = Breach::class;

    public static function form(Form $form): Form
    {
        return $form
            ->columns(2)
            ->schema([
                TextInput::make('title')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.title'))
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                DateTimePicker::make('discovered_at')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.discovered_at'))
                    ->helperText(__('filament-gdpr-breaches::filament-gdpr-breaches.help.discovered_at'))
                    ->default(now())
                    ->required()
                    ->disabledOn('edit'),
                DateTimePicker::make('occurred_at')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.occurred_at')),
                Textarea::make('description')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.description'))
                    ->columnSpanFull(),
                TagsInput::make('data_categories')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.data_categories')),
                TextInput::make('affected_subjects')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.affected_subjects'))
                    ->numeric()
                    ->minValue(0),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(1)
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('title')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.title'))
                            ->columnSpanFull(),
                        TextEntry::make('status')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.status'))
                            ->state(fn (Breach $record): string => Labels::status($record))
                            ->formatStateUsing(fn (string $state): string => __("filament-gdpr-breaches::filament-gdpr-breaches.status.{$state}"))
                            ->badge()
                            ->color(fn (string $state): string => Labels::statusColor($state)),
                        TextEntry::make('risk')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.risk'))
                            ->state(fn (Breach $record): ?string => $record->risk?->value)
                            ->formatStateUsing(fn (?string $state): string => Labels::risk($state))
                            ->placeholder(Labels::risk(null))
                            ->badge()
                            ->color(fn (?string $state): string => Labels::riskColor($state)),
                        TextEntry::make('discovered_at')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.discovered_at'))
                            ->dateTime(),
                        TextEntry::make('due_at')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.due_at'))
                            ->dateTime()
                            ->color(fn (Breach $record): ?string => $record->isOverdue() ? 'danger' : null),
                        TextEntry::make('occurred_at')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.occurred_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('affected_subjects')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.affected_subjects'))
                            ->placeholder('-'),
                        TextEntry::make('data_categories')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.data_categories'))
                            ->badge()
                            ->placeholder('-'),
                        TextEntry::make('authority_notified_at')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.authority_notified_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('authority_reference')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.authority_reference'))
                            ->placeholder('-'),
                        TextEntry::make('delay_reason')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.delay_reason'))
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('further_information_at')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.further_information_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('subjects_notified_at')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.subjects_notified_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('no_subject_notice_reason')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.no_subject_notice_reason'))
                            ->placeholder('-'),
                        TextEntry::make('closed_at')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.closed_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('description')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.description'))
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('measures')
                            ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.measures'))
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.title'))
                    ->searchable()
                    ->limit(50),
                TextColumn::make('status')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.status'))
                    ->state(fn (Breach $record): string => Labels::status($record))
                    ->formatStateUsing(fn (string $state): string => __("filament-gdpr-breaches::filament-gdpr-breaches.status.{$state}"))
                    ->badge()
                    ->color(fn (string $state): string => Labels::statusColor($state)),
                TextColumn::make('risk')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.risk'))
                    ->state(fn (Breach $record): string => Labels::risk($record->risk?->value))
                    ->badge()
                    ->color(fn (Breach $record): string => Labels::riskColor($record->risk?->value)),
                TextColumn::make('discovered_at')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.discovered_at'))
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('due_at')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.due_at'))
                    ->dateTime()
                    ->sortable()
                    ->color(fn (Breach $record): ?string => $record->isOverdue() ? 'danger' : null),
                IconColumn::make('authority')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.authority'))
                    ->state(fn (Breach $record): bool => $record->authority_notified_at !== null)
                    ->boolean(),
                IconColumn::make('subjects')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.subjects'))
                    ->state(fn (Breach $record): bool => $record->subjects_notified_at !== null)
                    ->boolean(),
            ])
            ->defaultSort('discovered_at', 'desc')
            ->filters([
                Filter::make('pending')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.status.pending'))
                    ->query(fn (Builder $query): Builder => $query->scopes('pending')),
                Filter::make('overdue')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.status.overdue'))
                    ->query(fn (Builder $query): Builder => $query->scopes('overdue')),
                SelectFilter::make('risk')
                    ->label(__('filament-gdpr-breaches::filament-gdpr-breaches.fields.risk'))
                    ->options(Labels::risks()),
            ])
            ->actions([
                ViewAction::make(),
                ActionGroup::make([EditAction::make(), ...BreachActions::all(TableAction::class)]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBreaches::route('/'),
            'create' => CreateBreach::route('/create'),
            'view' => ViewBreach::route('/{record}'),
            'edit' => EditBreach::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('filament-gdpr-breaches::filament-gdpr-breaches.resource.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-gdpr-breaches::filament-gdpr-breaches.resource.plural_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return GdprBreachesPlugin::get()->getNavigationGroup();
    }

    public static function getNavigationSort(): ?int
    {
        return GdprBreachesPlugin::get()->getNavigationSort();
    }

    public static function getNavigationIcon(): ?string
    {
        return GdprBreachesPlugin::get()->getNavigationIcon();
    }

    public static function getSlug(): string
    {
        return GdprBreachesPlugin::get()->getSlug();
    }

    public static function getNavigationBadge(): ?string
    {
        $pending = Breach::query()->scopes('pending')->count();

        return $pending > 0 ? (string) $pending : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return Breach::query()->scopes('overdue')->exists() ? 'danger' : 'warning';
    }
}
