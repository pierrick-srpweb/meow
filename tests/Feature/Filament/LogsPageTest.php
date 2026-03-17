<?php

use App\Filament\Pages\LogsPage;
use App\Models\Chat;
use App\Models\User;
use Livewire\Livewire;

it('allows admin to access logs page', function (): void {
    $this->actingAs(User::factory()->admin()->create());

    Livewire::test(LogsPage::class)
        ->assertSuccessful();
});

it('allows developpeur to access logs page', function (): void {
    $this->actingAs(User::factory()->developpeur()->create());

    Livewire::test(LogsPage::class)
        ->assertSuccessful();
});

it('denies editeur access to logs page', function (): void {
    $this->actingAs(User::factory()->create());

    Livewire::test(LogsPage::class)
        ->assertForbidden();
});

it('logs chat creation activity', function (): void {
    $this->actingAs($admin = User::factory()->admin()->create());

    $chat = Chat::factory()->create(['nom' => 'Minou']);

    Livewire::test(LogsPage::class)
        ->assertCanSeeTableRecords(
            \Spatie\Activitylog\Models\Activity::where('subject_type', Chat::class)->get()
        );
});

it('logs chat update activity', function (): void {
    $this->actingAs(User::factory()->admin()->create());

    $chat = Chat::factory()->create(['nom' => 'Minou']);
    $chat->update(['nom' => 'Felix']);

    $activity = \Spatie\Activitylog\Models\Activity::where('event', 'updated')
        ->where('subject_type', Chat::class)
        ->first();

    expect($activity)
        ->not->toBeNull()
        ->properties->toHaveKey('old')
        ->properties->toHaveKey('attributes');
});
