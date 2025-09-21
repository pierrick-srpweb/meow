<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('page.photo_principale_association', null);
        $this->migrator->add('page.photo_secondaire_1_association', null);
        $this->migrator->add('page.photo_secondaire_2_association', null);
    }
};
