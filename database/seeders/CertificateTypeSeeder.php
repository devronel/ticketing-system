<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('certificate_types')->insert([
            [
                'name' => 'Barangay Clearance',
                'form_data' => json_encode([
                    [
                        'type' => 'text',
                        'label' => 'Purpose',
                        'name' => 'purpose',
                        'value' => ''
                    ]
                ]),
                'price' => 50.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Barangay Indigency',
                'form_data' => json_encode([
                    [
                        'type' => 'text',
                        'label' => 'Purpose',
                        'name' => 'purpose',
                        'value' => ''
                    ]
                ]),
                'price' => 100.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
