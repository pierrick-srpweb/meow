<?php

namespace Database\Factories;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ChatFactory extends Factory
{
    protected $model = Chat::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->firstName(),
            'slug' => $this->faker->slug(),
            'sexe' => $this->faker->randomElement(['male', 'femelle']),
            'date_naissance' => Carbon::now()->subMonths($this->faker->numberBetween(1, 48)),
            'ok_chien' => $this->faker->boolean(),
            'ok_enfant' => $this->faker->boolean(),
            'litiere' => $this->faker->boolean(),
            'vaccination' => '',
            'numero_puce' => $this->faker->randomNumber(8, true),
            'antipuce' => '',
            'vermifuge' => '',
            'description' => $this->faker->text(),
            'famille_accueil' => '',
            'reservation' => '',
            'adoption' => '',
            'famille_adoption' => '',
            'categorie' => $this->faker->randomElement(['Adulte', 'Chaton', 'Senior']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
