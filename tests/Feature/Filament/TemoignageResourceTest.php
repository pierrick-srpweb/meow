<?php

use App\Filament\Resources\Temoignages\Pages\CreateTemoignage;
use App\Filament\Resources\Temoignages\Pages\EditTemoignage;
use App\Filament\Resources\Temoignages\Pages\ListTemoignages;
use App\Models\Chat;
use App\Models\Temoignage;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function (): void {
    $this->actingAs(User::factory()->create());
});

it('can render list page', function (): void {
    Livewire::test(ListTemoignages::class)
        ->assertSuccessful();
});

it('can list temoignages', function (): void {
    $chat = Chat::factory()->create();
    $temoignages = Temoignage::factory()->count(3)->create([
        'chat_id' => $chat->id,
    ]);

    Livewire::test(ListTemoignages::class)
        ->assertCanSeeTableRecords($temoignages);
});

it('can render create page', function (): void {
    Livewire::test(CreateTemoignage::class)
        ->assertSuccessful();
});

it('can create temoignage with required fields', function (): void {
    $chat = Chat::factory()->create();
    $newData = [
        'chat_id' => $chat->id,
        'contenu' => 'Un super témoignage sur ce magnifique chat.',
        'famille' => 'Famille Dupont',
    ];

    Livewire::test(CreateTemoignage::class)
        ->fillForm($newData)
        ->call('create')
        ->assertHasNoFormErrors();

    $temoignage = Temoignage::where('famille', 'Famille Dupont')->first();
    expect($temoignage)
        ->not->toBeNull()
        ->chat_id->toBe($chat->id)
        ->famille->toBe('Famille Dupont');
});

it('validates famille is required on create', function (): void {
    Livewire::test(CreateTemoignage::class)
        ->fillForm([
            'famille' => null,
            'contenu' => 'Test',
        ])
        ->call('create')
        ->assertHasFormErrors(['famille' => 'required']);
});

it('can render edit page', function (): void {
    $chat = Chat::factory()->create();
    $temoignage = Temoignage::factory()->create(['chat_id' => $chat->id]);

    Livewire::test(EditTemoignage::class, ['record' => $temoignage->getRouteKey()])
        ->assertSuccessful();
});

it('can retrieve data on edit page', function (): void {
    $chat = Chat::factory()->create();
    $temoignage = Temoignage::factory()->create(['chat_id' => $chat->id]);

    Livewire::test(EditTemoignage::class, ['record' => $temoignage->getRouteKey()])
        ->assertFormSet([
            'chat_id' => $temoignage->chat_id,
            'famille' => $temoignage->famille,
        ]);
});

it('can update temoignage', function (): void {
    $chat = Chat::factory()->create();
    $temoignage = Temoignage::factory()->create(['chat_id' => $chat->id]);
    $newData = [
        'contenu' => 'Témoignage mis à jour.',
        'famille' => 'Famille Martin',
    ];

    Livewire::test(EditTemoignage::class, ['record' => $temoignage->getRouteKey()])
        ->fillForm($newData)
        ->call('save')
        ->assertHasNoFormErrors();

    expect($temoignage->refresh()->famille)->toBe('Famille Martin');
});

it('validates famille is required on update', function (): void {
    $chat = Chat::factory()->create();
    $temoignage = Temoignage::factory()->create(['chat_id' => $chat->id]);

    Livewire::test(EditTemoignage::class, ['record' => $temoignage->getRouteKey()])
        ->fillForm([
            'famille' => null,
        ])
        ->call('save')
        ->assertHasFormErrors(['famille' => 'required']);
});

it('can delete temoignage', function (): void {
    $chat = Chat::factory()->create();
    $temoignage = Temoignage::factory()->create(['chat_id' => $chat->id]);

    Livewire::test(EditTemoignage::class, ['record' => $temoignage->getRouteKey()])
        ->callAction('delete');

    $this->assertModelMissing($temoignage);
});

it('can associate temoignage with chat', function (): void {
    $chat1 = Chat::factory()->create(['nom' => 'Minou']);
    $chat2 = Chat::factory()->create(['nom' => 'Felix']);
    $temoignage = Temoignage::factory()->create(['chat_id' => $chat1->id]);

    Livewire::test(EditTemoignage::class, ['record' => $temoignage->getRouteKey()])
        ->fillForm(['chat_id' => $chat2->id])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($temoignage->refresh()->chat_id)->toBe($chat2->id);
});

it('loads chat relationship correctly', function (): void {
    $chat = Chat::factory()->create(['nom' => 'Minou']);
    $temoignage = Temoignage::factory()->create(['chat_id' => $chat->id]);

    expect($temoignage->chat)
        ->toBeInstanceOf(Chat::class)
        ->nom->toBe('Minou');
});

it('can create temoignage without chat_id', function (): void {
    $newData = [
        'chat_id' => null,
        'contenu' => 'Témoignage sans chat associé.',
        'famille' => 'Famille Test',
    ];

    Livewire::test(CreateTemoignage::class)
        ->fillForm($newData)
        ->call('create')
        ->assertHasNoFormErrors();

    $temoignage = Temoignage::where('famille', 'Famille Test')->first();
    expect($temoignage)
        ->not->toBeNull()
        ->chat_id->toBeNull()
        ->famille->toBe('Famille Test');
});
