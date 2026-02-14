<?php

namespace App\Livewire;

use App\Settings\AssoSettings;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Adopter')]
class AdopterPage extends Component
{
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('livewire.adopter-page', [
            'info_asso' => app(AssoSettings::class),
            'tarifs' => app(AssoSettings::class)->tarifs,
        ]);
    }
}
