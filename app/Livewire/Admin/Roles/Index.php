<?php

namespace App\Livewire\Admin\Roles;

use App\Models\Roles;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $isAddModalOpen = false;

    public $roleId;
    public $name;
    // public $permissions = [
    //     'dashboard' => [
    //         'view' => false
    //     ],
    //     'ticket-management' => [
    //         'view' => false,
    //         'create' => false,
    //         'update' => false,
    //         'delete' => false,
    //     ],
    //     'user-management' => [
    //         'view' => false,
    //         'create' => false,
    //         'update' => false,
    //         'delete' => false,
    //     ],
    // ];

    public $permissions = [
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
                    'can_view' => false,
                    'can_edit' => false,
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
        ],
    ];

    #[On('status-changed')]
    public function changedStatus($id, $value)
    {
        try {
            $department = Roles::select('id')->find($id);
            $department->status = $value;
            $department->save();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function save()
    {
        try {
            $roles = Roles::updateOrCreate(
                ['id' => $this->roleId],
                [
                    'name' => $this->name,
                    'permissions' => $this->permissions
                ]
            );
            if ($roles) {
                $this->resetComponent();
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function fetchEdit($id)
    {
        try {
            $this->isAddModalOpen = true;
            $role = Roles::find($id);
            $this->roleId = $role->id;
            $this->name = $role->name;
            $this->permissions = $role->permissions;
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function resetComponent()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.roles.index', [
            'roles' => Roles::all()
        ]);
    }
}
