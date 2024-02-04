<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ExpenseSeeder::class,
            IncomeSeeder::class,
            PatientSeeder::class,
            ReservationSeeder::class,
            SummarySeeder::class,
            VisitSeeder::class,
            WalletSeeder::class,
            GivenSeeder::class,
            TakenSeeder::class,
        ]);
    }
}
