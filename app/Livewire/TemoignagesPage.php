<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Témoignages')]
class TemoignagesPage extends Component
{
    public function render()
    {
        return view('livewire.temoignages');
    }
}
