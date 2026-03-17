<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Role: string implements HasLabel
{
    case Developpeur = 'developpeur';
    case Admin = 'admin';
    case Editeur = 'editeur';

    public function getLabel(): string
    {
        return match ($this) {
            self::Developpeur => 'Développeur',
            self::Admin => 'Administrateur',
            self::Editeur => 'Éditeur',
        };
    }
}
