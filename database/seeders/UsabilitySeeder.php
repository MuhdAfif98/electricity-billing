<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usabilities')->insert([
            ['customer_id' => 1, 'month' => 'June', 'usability' => 210, 'bill' => 230.00],
            ['customer_id' => 2, 'month' => 'October', 'usability' => 100, 'bill' => 120.00],
            ['customer_id' => 3, 'month' => 'January', 'usability' => 150, 'bill' => 95.00],
        ]);
    }
}