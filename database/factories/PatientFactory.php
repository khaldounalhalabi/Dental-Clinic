<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    protected $model = Patient::class ;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName() ,
            'last_name' =>$this->faker->lastName() ,
            'birth_date' => $this->faker->date('Y-m-d')  ,
            'phone_number' => $this->faker->phoneNumber() ,
            'home_number' => $this->faker->phoneNumber() ,
            'city' => $this->faker->city() ,
            'street' => $this->faker->streetName() ,
            'notes' => $this->faker->sentence() ,

        ];
    }
}
