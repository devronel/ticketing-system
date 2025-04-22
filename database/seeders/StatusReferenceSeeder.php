<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_references')->insert([
            [
                'name' => 'Open',
                'color' => '#2563EB',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'In Progress',
                'color' => '#F59E0B',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pending',
                'color' => '#EAB308',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'On Hold',
                'color' => '#6B7280',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Resolved',
                'color' => '#10B981',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Closed',
                'color' => '#9CA3AF',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Reopened',
                'color' => '#DC2626',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
