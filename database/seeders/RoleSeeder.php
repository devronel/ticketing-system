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
        DB::table('roles')->insert([
            [
                'name' => 'Administrator',
                'permissions' => json_encode([
                    'dashboard_management' => [
                        'description' => 'Dashboard Management',
                        'sections' => [
                            'dashboard' => [
                                'can_view' => true
                            ]
                        ]
                    ],
                    'ticket_management' => [
                        'description' => 'Ticket Management',
                        'sections' => [
                            'ticket' => [
                                'can_create' => true,
                                'can_edit' => true,
                                'can_delete' => true,
                                'can_view' => true,
                            ]
                        ]
                    ],
                    'user_management' => [
                        'description' => 'User Management',
                        'sections' => [
                            'user' => [
                                'can_create' => true,
                                'can_edit' => true,
                                'can_delete' => true,
                                'can_view' => true,
                            ],
                            'role' => [
                                'can_create' => true,
                                'can_edit' => true,
                                'can_delete' => true,
                                'can_view' => true,
                            ],
                            'department' => [
                                'can_create' => true,
                                'can_edit' => true,
                                'can_delete' => true,
                                'can_view' => true,
                            ]
                        ]
                    ],
                    'references_management' => [
                        'description' => 'References Management',
                        'sections' => [
                            'reference' => [
                                'can_create' => true,
                                'can_view' => true,
                                'can_edit' => true,
                                'can_delete' => true,
                            ]
                        ]
                    ]
                ]),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Agent',
                'permissions' => json_encode([
                    'dashboard_management' => [
                        'description' => 'Dashboard Management',
                        'sections' => [
                            'dashboard' => [
                                'can_view' => false
                            ]
                        ]
                    ],
                    'ticket_management' => [
                        'description' => 'Ticket Management',
                        'sections' => [
                            'ticket' => [
                                'can_create' => false,
                                'can_view' => true,
                                'can_edit' => true,
                                'can_delete' => false,
                            ]
                        ]
                    ],
                    'user_management' => [
                        'description' => 'User Management',
                        'sections' => [
                            'user' => [
                                'can_create' => false,
                                'can_edit' => false,
                                'can_delete' => false,
                                'can_view' => false,
                            ],
                            'role' => [
                                'can_create' => false,
                                'can_edit' => false,
                                'can_delete' => false,
                                'can_view' => false,
                            ],
                            'department' => [
                                'can_create' => false,
                                'can_edit' => false,
                                'can_delete' => false,
                                'can_view' => false,
                            ]
                        ]
                    ],
                    'references_management' => [
                        'description' => 'References Management',
                        'sections' => [
                            'reference' => [
                                'can_create' => false,
                                'can_view' => false,
                                'can_edit' => false,
                                'can_delete' => false,
                            ]
                        ]
                    ]
                ]),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
