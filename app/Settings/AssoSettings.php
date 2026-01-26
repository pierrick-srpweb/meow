<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AssoSettings extends Settings
{
    public string $adresse;

    public string $code_postal;

    public string $ville;

    public string $telephone;

    public string $email;

    public string $facebook;

    public string $site_dons;

    public static function group(): string
    {
        return 'asso';
    }
}
