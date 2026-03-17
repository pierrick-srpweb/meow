<?php

namespace App\Models;

use App\Enums\Role;
use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, LogsActivity, Notifiable;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => Role::class,
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'role'])
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn (string $eventName): string => "Utilisateur \"{$this->name}\" a été {$eventName}");
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function isDeveloppeur(): bool
    {
        return $this->role === Role::Developpeur;
    }

    public function isAdmin(): bool
    {
        return $this->role === Role::Admin;
    }

    public function isEditeur(): bool
    {
        return $this->role === Role::Editeur;
    }

    public function isAdminOrDeveloppeur(): bool
    {
        return $this->isAdmin() || $this->isDeveloppeur();
    }
}
