<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            ['name' => 'John', 'building_type' => 'Commercial', 'state' => 'State 1'],
            ['name' => 'Ahmad', 'building_type' => 'Commercial', 'state' => 'State 2'],
            ['name' => 'Mary', 'building_type' => 'Residential', 'state' => 'State 3'],
        ]);
    }
}