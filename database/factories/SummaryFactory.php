<?php

namespace Database\Factories;

use App\Models\Summary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Summary>
 */
class SummaryFactory extends Factory
{
    protected $model = Summary::class ;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'month' => $this->faker->date('2022-m-1') ,
            'expenses' => $this->faker->numberBetween(1000 , 1000000) ,
            'incomes' => $this->faker->numberBetween(1000 , 1000000) ,
            'difference' => $this->faker->numberBetween(1000, 1000000),
        ];
    }
}
