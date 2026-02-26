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

    public array $tarifs;

    public function telephoneFormatted(): string
    {
        $digits = preg_replace('/\D/', '', $this->telephone);

        if (str_starts_with($digits, '33')) {
            $digits = '0'.substr($digits, 2);
        }

        return trim(chunk_split($digits, 2, ' '));
    }

    public static function group(): string
    {
        return 'asso';
    }
}
