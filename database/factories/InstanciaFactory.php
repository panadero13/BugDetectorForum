<?php

namespace Database\Factories;

use App\Models\Instancia;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\InstanciaTiposEnum;

class InstanciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instancia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->unique()->safeEmail(),
            'type' => 'Mejora',
            'user_id' => 1,
        ];
    }
}
