<?php

namespace Database\Seeders;

use App\Models\Summary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SummarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Summary::factory()->count(50)->create();
    }
}
