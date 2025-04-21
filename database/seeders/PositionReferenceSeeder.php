<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('position_references')->insert([
            ['name' => 'Barangay Captain', 'status' => true],
            ['name' => 'Barangay Kagawad', 'status' => true],
            ['name' => 'Barangay Secretary', 'status' => true],
            ['name' => 'Barangay Treasurer', 'status' => true],
            ['name' => 'Sangguniang Kabataan Chairman', 'status' => true],
            ['name' => 'SK Kagawad', 'status' => true],
            ['name' => 'Barangay Tanod', 'status' => true],
            ['name' => 'Barangay Health Worker', 'status' => true],
            ['name' => 'Barangay Nutrition Scholar', 'status' => true],
            ['name' => 'Barangay Midwife', 'status' => true],
            ['name' => 'Barangay Day Care Worker', 'status' => true],
            ['name' => 'Barangay Lupong Tagapamayapa', 'status' => true],
        ]);
    }
}
