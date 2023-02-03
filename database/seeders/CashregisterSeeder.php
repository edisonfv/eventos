<?php

namespace Database\Seeders;

use App\Models\Cashregister;
use Illuminate\Database\Seeder;

class CashregisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cashregister::factory()
            ->count(5)
            ->create();
    }
}
