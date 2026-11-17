<?php

use Illuminate\Support\Carbon;
use JeffersonGoncalves\Filament\GdprBreaches\GdprBreachesPlugin;
use JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\BreachResource;
use JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\Pages\CreateBreach;
use JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\Pages\EditBreach;
use JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\Pages\ListBreaches;
use JeffersonGoncalves\Filament\GdprBreaches\Resources\Breaches\Pages\ViewBreach;
use JeffersonGoncalves\Filament\GdprBreaches\Tests\Fixtures\TestUser;
use JeffersonGoncalves\GdprBreaches\Enums\Risk;
use JeffersonGoncalves\GdprBreaches\Facades\GdprBreaches;
use JeffersonGoncalves\GdprBreaches\Models\Breach;
use Livewire\Livewire;

beforeEach(function () {
    $this->actingAs(TestUser::create(['name' => 'DPO', 'email' => 'dpo@example.com']));
});

it('registers a breach with the 72-hour deadline', function () {
    Livewire::test(CreateBreach::class)
        ->fillForm([
            'title' => 'Backup exposed',
            'discovered_at' => '2026-11-13 10:00:00',
            'data_categories' => ['contact', 'financial'],
            'affected_subjects' => 120,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Breach::sole())
        ->due_at->toDateTimeString()->toBe('2026-11-16 10:00:00')
        ->data_categories->toBe(['contact', 'financial'])
        ->risk->toBeNull();
});

it('lists breaches and filters the overdue ones', function () {
    $overdue = GdprBreaches::open('Backup exposed', Carbon::now()->subDays(4));
    $recent = GdprBreaches::open('Phishing');

    Livewire::test(ListBreaches::class)
        ->assertCanSeeTableRecords([$overdue, $recent])
        ->filterTable('overdue')
        ->assertCanSeeTableRecords([$overdue])
        ->assertCanNotSeeTableRecords([$recent]);

    expect(BreachResource::getNavigationBadge())->toBe('2')
        ->and(BreachResource::getNavigationBadgeColor())->toBe('danger');
});

it('walks a high-risk breach through assessment, notifications and closing', function () {
    $breach = GdprBreaches::open('Backup exposed');

    Livewire::test(ViewBreach::class, ['record' => $breach->getKey()])
        ->assertActionHidden('close')
        ->callAction('assess', ['risk' => 'high', 'measures' => 'Passwords exposed.'])
        ->assertHasNoActionErrors();

    Livewire::test(ViewBreach::class, ['record' => $breach->getKey()])
        ->callAction('notifyAuthority', ['reference' => 'DPA-42', 'at' => now()->toDateTimeString(), 'phased' => true]);

    Livewire::test(ViewBreach::class, ['record' => $breach->getKey()])
        ->assertActionHidden('notifyAuthority')
        ->callAction('furtherInformation', ['at' => now()->toDateTimeString()])
        ->assertActionHidden('furtherInformation');

    Livewire::test(ViewBreach::class, ['record' => $breach->getKey()])
        ->callAction('notifySubjects', ['at' => '2026-11-16 10:00:00']);

    Livewire::test(ViewBreach::class, ['record' => $breach->getKey()])
        ->callAction('close', ['measures' => 'Bucket made private.']);

    expect($breach->fresh())
        ->risk->toBe(Risk::High)
        ->authority_reference->toBe('DPA-42')
        ->further_information_at->not->toBeNull()
        ->subjects_notified_at->toDateTimeString()->toBe('2026-11-16 10:00:00')
        ->closed_at->not->toBeNull();
});

it('asks for the reasons of a late notice', function () {
    $breach = GdprBreaches::assess(GdprBreaches::open('Ransomware', now()->subDays(5)), Risk::Risk);

    Livewire::test(ViewBreach::class, ['record' => $breach->getKey()])
        ->callAction('notifyAuthority', ['reference' => 'DPA-7', 'at' => now()->toDateTimeString()]);

    expect($breach->fresh()->authority_notified_at)->toBeNull();

    Livewire::test(ViewBreach::class, ['record' => $breach->getKey()])
        ->callAction('notifyAuthority', ['reference' => 'DPA-7', 'at' => now()->toDateTimeString(), 'delay_reason' => 'Forensics took four days.']);

    expect($breach->fresh()->delay_reason)->toBe('Forensics took four days.');
});

it('records why the data subjects are not told', function () {
    $breach = GdprBreaches::notifyAuthority(GdprBreaches::assess(GdprBreaches::open('Laptop stolen'), Risk::High), 'DPA-9');

    Livewire::test(ViewBreach::class, ['record' => $breach->getKey()])
        ->callAction('skipSubjectNotice', ['reason' => 'Full-disk encryption (Art. 34(3)(a)).'])
        ->assertActionHidden('notifySubjects');

    expect($breach->fresh()->owesSubjectNotice())->toBeFalse();
});

it('hides the notifications when a risk is unlikely', function () {
    $breach = GdprBreaches::assess(GdprBreaches::open('Lost encrypted laptop'), Risk::Unlikely);

    Livewire::test(ViewBreach::class, ['record' => $breach->getKey()])
        ->assertActionHidden('notifyAuthority')
        ->assertActionHidden('notifySubjects')
        ->assertActionVisible('close');
});

it('edits the description but never the awareness date', function () {
    $breach = GdprBreaches::open('Backup exposed', Carbon::parse('2026-11-13 10:00'));

    Livewire::test(EditBreach::class, ['record' => $breach->getKey()])
        ->fillForm(['description' => 'Public bucket for 2 hours.', 'discovered_at' => '2026-11-01 10:00:00'])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($breach->fresh())
        ->description->toBe('Public bucket for 2 hours.')
        ->discovered_at->toDateTimeString()->toBe('2026-11-13 10:00:00');
});

it('offers the same actions on the table rows', function () {
    $breach = GdprBreaches::open('Backup exposed');

    Livewire::test(ListBreaches::class)
        ->callTableAction('assess', $breach, ['risk' => 'unlikely']);

    expect($breach->fresh()->risk)->toBe(Risk::Unlikely);
});

it('applies the fluent plugin options', function () {
    GdprBreachesPlugin::get()->navigationGroup('GDPR')->slug('security-breaches');

    expect(BreachResource::getNavigationGroup())->toBe('GDPR')
        ->and(BreachResource::getSlug())->toBe('security-breaches');
});
