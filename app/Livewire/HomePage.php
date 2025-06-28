<?php

namespace App\Livewire;

use App\Settings\AssoSettings;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Accueil')]
class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page', [
            'site_dons' => app(AssoSettings::class)->site_dons,
            'facebook' => app(AssoSettings::class)->facebook,
        ]);
    }
}
