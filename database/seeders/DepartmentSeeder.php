<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'name' => 'IT',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sales',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Marketing',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Graphic Designer',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
