<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriorityReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('priority_references')->insert([
            [
                'name' => 'Urgent',
                'color' => '#DC2626',
                'level' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'High',
                'color' => '#F97316',
                'level' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Medium',
                'color' => '#2563EB',
                'level' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Low',
                'color' => '#6B7280',
                'level' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
