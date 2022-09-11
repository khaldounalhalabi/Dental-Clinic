<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{

    protected $model = Reservation::class ;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'patient_id'=>$this->faker->numberBetween(1 , 50) ,
            'first_name' => $this->faker->firstName() ,
            'last_name' =>$this->faker->lastName() ,
            'date' => $this->faker->dateTimeBetween('-1 month', '+1 month')->format('y-m-d') ,
            'time' => $this->faker->time() ,
            'phone_number' => $this->faker->phoneNumber() ,
            'home_number' => $this->faker->phoneNumber() ,
            'reason' => $this->faker->sentence() ,
            'status' => implode($this->faker->randomElements(['waiting' , 'done' , 'did\'nt come' , 'postponed'])) ,
        ];
    }
}
