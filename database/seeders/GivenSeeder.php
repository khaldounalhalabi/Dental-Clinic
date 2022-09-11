<?php

namespace Database\Seeders;

use App\Models\Given;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GivenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Given::factory()->count(50)->create();
    }
}
