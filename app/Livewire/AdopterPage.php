<?php

namespace App\Livewire;

use App\Models\Chat;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Adopter')]
class AdopterPage extends Component
{
    public function render()
    {
        return view('livewire.adopter-page');
    }
}
