<?php

namespace App\Livewire;

use App\Models\Chat;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Chats à adopter')]
class ListeChats extends Component
{
    public string $filtre = 'tous';

    public function filtrer($value)
    {
        $this->filtre = $value;
    }

    public function render()
    {
        $query = Chat::query();

        if ($this->filtre !== 'tous') {
            $query = $query->where('categorie', $this->filtre);
        }

        return view('livewire.liste-chats', [
            'chats' => $query->where('est_publie', true)->get(),
        ]);
    }
}
