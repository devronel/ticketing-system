<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Roles::where('name', 'Super Admin')->firstOrFail();
        $admin = Roles::where('name', 'Admin')->firstOrFail();
        $agent = Roles::where('name', 'Agent')->firstOrFail();
        $customer = Roles::where('name', 'Customer')->firstOrFail();
        DB::table('users')->insert([
            [
                'username' => 'lonewolf',
                'email' => 'super-admin@email.com',
                'password' => Hash::make('password'),
                'department_id' => 1,
                'role_id' => $role->id
            ],
            [
                'username' => 'HC-USER-' . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
                'email' => 'PeterDSands@jourrapide.com',
                'password' => Hash::make('password'),
                'department_id' => 1,
                'role_id' => $admin->id
            ],
            [
                'username' => 'HC-USER-' . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
                'email' => 'DavidSChapman@armyspy.com',
                'password' => Hash::make('password'),
                'department_id' => 1,
                'role_id' => $agent->id
            ],
            [
                'username' => 'HC-USER-' . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
                'email' => 'KimberlyJKittle@jourrapide.com',
                'password' => Hash::make('password'),
                'department_id' => 1,
                'role_id' => $customer->id
            ]
        ]);
    }
}
