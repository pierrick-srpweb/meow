<?php

namespace App\Livewire;

use App\Settings\AssoSettings;
use App\Settings\PageSettings;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Accueil')]
class HomePage extends Component
{
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $assoSettings = app(AssoSettings::class);
        $pageSettings = app(PageSettings::class);

        return view('livewire.home-page', [
            'site_dons' => $assoSettings->site_dons,
            'facebook' => $assoSettings->facebook,
            'photo_principale' => $pageSettings->photo_principale_association,
            'photo_secondaire_1' => $pageSettings->photo_secondaire_1_association,
            'photo_secondaire_2' => $pageSettings->photo_secondaire_2_association,
        ]);
    }
}
