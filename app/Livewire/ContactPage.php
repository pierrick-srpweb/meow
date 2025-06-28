<?php

namespace App\Livewire;

use App\Settings\AssoSettings;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Nous contacter')]
class ContactPage extends Component
{
    public function render()
    {
        return view('livewire.contact-page', [
            'info_asso' => app(AssoSettings::class),
        ]);
    }
}
