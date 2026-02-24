<?php

namespace App\Livewire;

use App\Models\Chat;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Chats à adopter')]
class ListeChats extends Component
{
    public string $filtre = 'tous';

    private const array FILTRES_AUTORISES = ['tous', 'Adulte', 'Chaton', 'Senior', 'Adopté', 'Etoile'];

    public function filtrer(string $value): void
    {
        if (in_array($value, self::FILTRES_AUTORISES, true)) {
            $this->filtre = $value;
        }
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $query = Chat::query();

        if ($this->filtre !== 'tous') {
            $query = $query->where('categorie', $this->filtre);
        } else {
            $query = $query->whereIn('categorie', ['Adulte', 'Chaton', 'Senior']);
        }

        return view('livewire.liste-chats', [
            'chats' => $query->where('est_publie', true)
                ->with('media')
                ->get(),
        ]);
    }
}
