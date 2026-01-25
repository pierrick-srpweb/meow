<?php

namespace Database\Factories;

use App\Models\Temoignage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TemoignageFactory extends Factory
{
    protected $model = Temoignage::class;

    public function definition(): array
    {
        return [
            'chat_id' => $this->faker->randomNumber(),
            'contenu' => $this->faker->word(),
            'famille' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
