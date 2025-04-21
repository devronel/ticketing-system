<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('residents')->insert([
        //     [
        //         'first_name'    => 'Juan',
        //         'middle_name'   => 'Reyes',
        //         'last_name'     => 'Dela Cruz',
        //         'phone_number'  => '09171234567',
        //         'email_address' => 'juan.delacruz@barangayph.com',
        //         'gender'        => 'male',
        //         'civil_status'  => 'single',
        //         'birth_date'    => '1990-05-15',
        //         'age'           => 34,
        //         'religion'      => 'Roman Catholic',
        //         'occupation'    => 'Tricycle Driver',
        //         'birth_place'   => 'Barangay Bagong Silang, Caloocan City',
        //         'purok_area'    => 'Purok 7',
        //     ],
        //     [
        //         'first_name'    => 'Maria',
        //         'middle_name'   => 'Lopez',
        //         'last_name'     => 'Santos',
        //         'phone_number'  => '09981234567',
        //         'email_address' => 'maria.santos@barangayph.com',
        //         'gender'        => 'female',
        //         'civil_status'  => 'married',
        //         'birth_date'    => '1986-09-28',
        //         'age'           => 38,
        //         'religion'      => 'Christian',
        //         'occupation'    => 'Barangay Health Worker',
        //         'birth_place'   => 'Barangay San Antonio, Makati City',
        //         'purok_area'    => 'Purok 2',
        //     ],
        //     [
        //         'first_name'    => 'Pedro',
        //         'middle_name'   => null,
        //         'last_name'     => 'Ramos',
        //         'phone_number'  => '09221234567',
        //         'email_address' => null,
        //         'gender'        => 'male',
        //         'civil_status'  => 'widowed',
        //         'birth_date'    => '1965-12-02',
        //         'age'           => 59,
        //         'religion'      => 'Iglesia ni Cristo',
        //         'occupation'    => 'Retired',
        //         'birth_place'   => 'Barangay Talomo, Davao City',
        //         'purok_area'    => 'Purok 4',
        //     ],
        //     [
        //         'first_name'    => 'Ana',
        //         'middle_name'   => 'Gonzales',
        //         'last_name'     => 'Flores',
        //         'phone_number'  => '09331234567',
        //         'email_address' => 'ana.flores@barangayph.com',
        //         'gender'        => 'female',
        //         'civil_status'  => 'single',
        //         'birth_date'    => '2000-03-10',
        //         'age'           => 24,
        //         'religion'      => 'Catholic',
        //         'occupation'    => 'Student',
        //         'birth_place'   => 'Barangay Lahug, Cebu City',
        //         'purok_area'    => 'Purok 1',
        //     ],
        // ]);
        $faker = Faker::create();

        $barangays = [
            'Bagong Silang',
            'San Antonio',
            'Talomo',
            'Lahug',
            'Commonwealth',
            'Muzon',
            'Payatas',
            'Batasan Hills',
            'San Isidro',
            'Poblacion',
            'Tinajeros',
            'San Bartolome',
            'Camalig',
            'Malanday',
            'Buli',
            'Bungad',
            'Bangkal',
            'Concepcion',
            'Malanday',
            'Sto. Niño',
        ];

        $puroks = ['Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5', 'Purok 6', 'Purok 7', 'Purok 8'];

        $religions = ['Roman Catholic', 'Christian', 'Iglesia ni Cristo', 'Muslim', 'Seventh-Day Adventist'];
        $occupations = ['Farmer', 'Teacher', 'Tricycle Driver', 'Student', 'Vendor', 'Barangay Health Worker', 'Nurse', 'Engineer', 'Driver', 'Housewife'];
        $civil_statuses = ['single', 'married', 'widowed', 'divorced'];

        for ($i = 0; $i < 50; $i++) {
            $gender = $faker->randomElement(['male', 'female']);
            $birthDate = $faker->dateTimeBetween('-80 years', '-18 years');
            $age = now()->diffInYears($birthDate);

            DB::table('residents')->insert([
                'first_name'    => $faker->firstName($gender),
                'middle_name'   => $faker->randomElement([$faker->lastName, null]),
                'last_name'     => $faker->lastName,
                'phone_number'  => '09' . $faker->numberBetween(10, 99) . $faker->numberBetween(10000000, 99999999),
                'email_address' => $faker->optional()->safeEmail,
                'gender'        => $gender,
                'civil_status'  => $faker->randomElement($civil_statuses),
                'birth_date'    => $birthDate->format('Y-m-d'),
                'age'           => $age,
                'religion'      => $faker->randomElement($religions),
                'occupation'    => $faker->randomElement($occupations),
                'birth_place'   => 'Barangay ' . $faker->randomElement($barangays) . ', ' . $faker->city,
                'purok_area'    => $faker->randomElement($puroks),
            ]);
        }
    }
}
