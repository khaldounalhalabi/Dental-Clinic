<?php

namespace Database\Seeders;

use App\Models\Taken;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TakenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Taken::factory()->count(50)->create();
    }
}
