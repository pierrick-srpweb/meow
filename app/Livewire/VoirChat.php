<?php

namespace App\Livewire;

use App\Models\Chat;
use Livewire\Component;

class VoirChat extends Component
{
    public Chat $chat;

    public function render()
    {
        $cv = $this->chat->getMedia('cv')->first()?->getUrl();

        return view('livewire.voir-chat', [
            'cv' => $cv
        ])
        ->title($this->chat->nom);
    }
}
