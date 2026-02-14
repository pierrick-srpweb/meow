<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('asso.tarifs', [
            ['prestation' => 'Chat identifié et déparasité (puces, vers et tiques)', 'prix' => '95€'],
            ['prestation' => 'Chat identifié, déparasité (puces, vers et tiques) et primo-vaccin', 'prix' => '125€'],
            ['prestation' => 'Chat identifié, déparasité (puces vers et tiques) et les deux vaccins', 'prix' => '165€'],
            ['prestation' => 'Chat identifié, déparasité (puces vers et tiques), primo-vaccin + stérilisé/castré', 'prix' => '185€'],
            ['prestation' => 'Chat identifié, déparasité (puces vers et tiques), deux vaccins et stérilisé/castré', 'prix' => '225€'],
            ['prestation' => 'Chat identifié, déparasité (puces vers et tiques), sans les vaccins et stérilisé/castré', 'prix' => '155€'],
            ['prestation' => 'Chat Sénior (+ 10 ans)', 'prix' => '85€'],
            ['prestation' => 'Tests FIV et FELV', 'prix' => '+35€'],
        ]);
    }
};
