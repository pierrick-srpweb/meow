<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Chat extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'nom',
        'slug',
        'sexe',
        'date_naissance',
        'ok_chien',
        'ok_enfant',
        'litiere',
        'vaccination',
        'numero_puce',
        'antipuce',
        'vermifuge',
        'description',
        'famille_accueil',
        'reservation',
        'adoption',
        'famille_adoption',
        'categorie',
        'est_publie',
        'date_publication',
    ];

    protected function casts(): array
    {
        return [
            'date_naissance' => 'date',
            'ok_chien' => 'boolean',
            'ok_enfant' => 'boolean',
            'litiere' => 'boolean',
            'est_publie' => 'boolean',
        ];
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }
}
