<?php

use App\Filament\Resources\Chats\Pages\CreateChat;
use App\Filament\Resources\Chats\Pages\EditChat;
use App\Filament\Resources\Chats\Pages\ListChats;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

beforeEach(function (): void {
    $this->actingAs(User::factory()->create());
    Storage::fake('public');
});

it('can render list page', function (): void {
    Livewire::test(ListChats::class)
        ->assertSuccessful();
});

it('can list chats', function (): void {
    $chats = Chat::factory()->count(3)->create();

    Livewire::test(ListChats::class)
        ->assertCanSeeTableRecords($chats);
});

it('can render create page', function (): void {
    Livewire::test(CreateChat::class)
        ->assertSuccessful();
});

it('can create chat with required fields', function (): void {
    $newData = [
        'nom' => 'Minou',
        'categorie' => 'Adulte',
        'cv' => [UploadedFile::fake()->image('photo.jpg')],
    ];

    Livewire::test(CreateChat::class)
        ->fillForm($newData)
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Chat::class, [
        'nom' => 'Minou',
        'categorie' => 'Adulte',
    ]);
});

it('validates nom is required on create', function (): void {
    Livewire::test(CreateChat::class)
        ->fillForm([
            'nom' => null,
            'categorie' => 'Adulte',
        ])
        ->call('create')
        ->assertHasFormErrors(['nom' => 'required']);
});

it('validates categorie is required on create', function (): void {
    Livewire::test(CreateChat::class)
        ->fillForm([
            'nom' => 'Test',
            'categorie' => null,
        ])
        ->call('create')
        ->assertHasFormErrors(['categorie' => 'required']);
});

it('validates cv is required on create', function (): void {
    Livewire::test(CreateChat::class)
        ->fillForm([
            'nom' => 'Test',
            'categorie' => 'Adulte',
            'cv' => null,
        ])
        ->call('create')
        ->assertHasFormErrors(['cv' => 'required']);
});

it('can render edit page', function (): void {
    $chat = Chat::factory()->create();

    Livewire::test(EditChat::class, ['record' => $chat->getRouteKey()])
        ->assertSuccessful();
});

it('can retrieve data on edit page', function (): void {
    $chat = Chat::factory()->create();

    Livewire::test(EditChat::class, ['record' => $chat->getRouteKey()])
        ->assertFormSet([
            'nom' => $chat->nom,
            'categorie' => $chat->categorie,
        ]);
});

it('can delete chat', function (): void {
    $chat = Chat::factory()->create();

    Livewire::test(EditChat::class, ['record' => $chat->getRouteKey()])
        ->callAction('delete');

    $this->assertModelMissing($chat);
});

it('can create chat with all attributes', function (): void {
    $newData = [
        'nom' => 'Minou',
        'categorie' => 'Adulte',
        'cv' => [UploadedFile::fake()->image('photo.jpg')],
        'ok_chien' => true,
        'ok_enfant' => false,
        'litiere' => true,
        'description' => 'Un chat magnifique',
        'est_publie' => true,
    ];

    Livewire::test(CreateChat::class)
        ->fillForm($newData)
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Chat::class, [
        'nom' => 'Minou',
        'categorie' => 'Adulte',
        'ok_chien' => true,
        'ok_enfant' => false,
        'litiere' => true,
        'est_publie' => true,
    ]);
});

it('can create chat with different categories', function (string $categorie): void {
    $newData = [
        'nom' => 'Test Chat',
        'categorie' => $categorie,
        'cv' => [UploadedFile::fake()->image('photo.jpg')],
    ];

    Livewire::test(CreateChat::class)
        ->fillForm($newData)
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Chat::class, [
        'nom' => 'Test Chat',
        'categorie' => $categorie,
    ]);
})->with(['Adulte', 'Chaton', 'Senior', 'Adopté', 'Etoile']);

it('can create chat with date naissance', function (): void {
    $date = now()->subYear();

    $newData = [
        'nom' => 'Test Chat',
        'categorie' => 'Adulte',
        'cv' => [UploadedFile::fake()->image('photo.jpg')],
        'date_naissance' => $date->format('Y-m-d'),
    ];

    Livewire::test(CreateChat::class)
        ->fillForm($newData)
        ->call('create')
        ->assertHasNoFormErrors();

    $chat = Chat::where('nom', 'Test Chat')->first();
    expect($chat->date_naissance->format('Y-m-d'))->toBe($date->format('Y-m-d'));
});

it('can create chat with photo gallery', function (): void {
    $newData = [
        'nom' => 'Test Chat',
        'categorie' => 'Adulte',
        'cv' => [UploadedFile::fake()->image('cv.jpg')],
        'photos' => [
            UploadedFile::fake()->image('photo1.jpg'),
            UploadedFile::fake()->image('photo2.jpg'),
        ],
    ];

    Livewire::test(CreateChat::class)
        ->fillForm($newData)
        ->call('create')
        ->assertHasNoFormErrors();

    $chat = Chat::where('nom', 'Test Chat')->first();
    expect($chat->getMedia('photos'))->toHaveCount(2);
});
