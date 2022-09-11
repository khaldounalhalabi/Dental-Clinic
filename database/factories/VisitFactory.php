<?php

namespace Database\Factories;

use App\Models\Visit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visit>
 */
class VisitFactory extends Factory
{
    protected $model = Visit::class ;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['regular' , 'emergency']) ,
            'patient_id' => $this->faker->numberBetween(1 , 50) ,
            'description' => $this->faker->sentence() ,
            'prescription' => $this->faker->sentence() ,
            'procedure' => $this->faker->sentence() ,
            'cost' => $this->faker->numberBetween(0 , 1000000) ,
        ];
    }
}
