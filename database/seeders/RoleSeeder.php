<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('roles')->insert([
        //     [
        //         'name' => 'Administrator',
        //         'permissions' => [
        //             'dashboard' => [
        //                 'view' => true,
        //             ],
        //             'ticket-management' => [
        //                 'view' => true,
        //                 'create' => true,
        //                 'edit' => true,
        //                 'delete' => true
        //             ],
        //             'user-management' => [
        //                 'view' => true,
        //                 'create' => true,
        //                 'edit' => true,
        //                 'delete' => true
        //             ]
        //         ],
        //         'status' => true,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]
        // ]);
    }
}
