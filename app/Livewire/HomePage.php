<?php

namespace App\Livewire;

use App\Settings\AssoSettings;
use App\Settings\PageSettings;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Accueil')]
class HomePage extends Component
{
    public function render()
    {
        $pageSettings = app(PageSettings::class);

        return view('livewire.home-page', [
            'site_dons' => app(AssoSettings::class)->site_dons,
            'facebook' => app(AssoSettings::class)->facebook,
            'photo_principale' => $pageSettings->photo_principale_association,
            'photo_secondaire_1' => $pageSettings->photo_secondaire_1_association,
            'photo_secondaire_2' => $pageSettings->photo_secondaire_2_association,
        ]);
    }
}
