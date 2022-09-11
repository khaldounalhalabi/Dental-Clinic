<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    protected $model = Expense::class ;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence() ,
            'cost' => $this->faker->numberBetween(0 , 100000) ,
            'date' => $this->faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d') ,
            'time' => $this->faker->time('h:i')  ,
        ];
    }
}
