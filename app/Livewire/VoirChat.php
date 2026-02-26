<?php

namespace App\Livewire;

use App\Models\Chat;
use Livewire\Component;

class VoirChat extends Component
{
    public Chat $chat;

    public function mount(Chat $chat): void
    {
        if (! $chat->est_publie) {
            abort(404);
        }

        $this->chat = $chat->load('media');
    }

    public function render()
    {
        return view('livewire.voir-chat')
            ->title($this->chat->nom);
    }
}
