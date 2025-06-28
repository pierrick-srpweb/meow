<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('asso.adresse', '4 rue platanes');
        $this->migrator->add('asso.code_postal', '17220');
        $this->migrator->add('asso.ville', 'Saint-Rogatien');
        $this->migrator->add('asso.telephone', '+33627560282');
        $this->migrator->add('asso.email', 'assomeowandco@gmail.com');
        $this->migrator->add('asso.facebook', 'https://www.facebook.com/groups/986595556883909/');
        $this->migrator->add('asso.site_dons', 'https://www.helloasso.com/associations/meow-and-co');
    }
};
