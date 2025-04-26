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
        $role = Roles::where('name', 'Admin')->firstOrFail();
        DB::table('users')->insert([
            'username' => 'lonewolf',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
            'department_id' => 1,
            'role_id' => $role->id
        ]);
    }
}
