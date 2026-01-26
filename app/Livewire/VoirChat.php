<?php

namespace App\Livewire;

use App\Models\Chat;
use Livewire\Component;

class VoirChat extends Component
{
    public Chat $chat;

    public function render()
    {
        $this->chat->load('media');

        return view('livewire.voir-chat')
            ->title($this->chat->nom);
    }
}
