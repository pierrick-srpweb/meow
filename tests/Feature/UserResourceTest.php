<?php

use App\Enums\Role;
use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Models\User;
use Livewire\Livewire;

it('allows admin to access user list', function (): void {
    $this->actingAs(User::factory()->admin()->create());

    Livewire::test(ListUsers::class)
        ->assertSuccessful();
});

it('allows developpeur to access user list', function (): void {
    $this->actingAs(User::factory()->developpeur()->create());

    Livewire::test(ListUsers::class)
        ->assertSuccessful();
});

it('denies editeur access to user list', function (): void {
    $this->actingAs(User::factory()->create());

    Livewire::test(ListUsers::class)
        ->assertForbidden();
});

it('can create a user', function (): void {
    $this->actingAs(User::factory()->admin()->create());

    Livewire::test(CreateUser::class)
        ->fillForm([
            'name' => 'Nouveau User',
            'email' => 'nouveau@example.com',
            'password' => 'motdepasse123',
            'role' => Role::Editeur,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(User::class, [
        'name' => 'Nouveau User',
        'email' => 'nouveau@example.com',
        'role' => 'editeur',
    ]);
});

it('can edit a user', function (): void {
    $this->actingAs(User::factory()->admin()->create());
    $user = User::factory()->create();

    Livewire::test(EditUser::class, ['record' => $user->getRouteKey()])
        ->fillForm([
            'name' => 'Nom Modifié',
            'email' => $user->email,
            'role' => Role::Admin,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($user->fresh())
        ->name->toBe('Nom Modifié')
        ->role->toBe(Role::Admin);
});

it('validates required fields on create', function (): void {
    $this->actingAs(User::factory()->admin()->create());

    Livewire::test(CreateUser::class)
        ->fillForm([
            'name' => null,
            'email' => null,
            'password' => null,
        ])
        ->call('create')
        ->assertHasFormErrors([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
});
