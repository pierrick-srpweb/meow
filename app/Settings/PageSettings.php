<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class PageSettings extends Settings
{
    public ?string $photo_principale_association;

    public ?string $photo_secondaire_1_association;

    public ?string $photo_secondaire_2_association;

    public static function group(): string
    {
        return 'page';
    }
}
