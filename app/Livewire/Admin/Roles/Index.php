<?php

namespace App\Livewire\Admin\Roles;

use App\Models\Permission;
use App\Models\Roles;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $isAddModalOpen = false;
    public $permissions = [];

    public $roleId;
    public $name;
    public $permission = [];

    // public $permissions = [
    //     'dashboard_management' => [
    //         'description' => 'Dashboard Management',
    //         'sections' => [
    //             'dashboard' => [
    //                 'can_view' => false
    //             ]
    //         ]
    //     ],
    //     'ticket_management' => [
    //         'description' => 'Ticket Management',
    //         'sections' => [
    //             'ticket' => [
    //                 'can_create' => false,
    //                 'can_view' => false,
    //                 'can_edit' => false,
    //                 'can_delete' => false,
    //             ]
    //         ]
    //     ],
    //     'user_management' => [
    //         'description' => 'User Management',
    //         'sections' => [
    //             'user' => [
    //                 'can_create' => false,
    //                 'can_edit' => false,
    //                 'can_delete' => false,
    //                 'can_view' => false,
    //             ],
    //             'role' => [
    //                 'can_create' => false,
    //                 'can_edit' => false,
    //                 'can_delete' => false,
    //                 'can_view' => false,
    //             ],
    //             'department' => [
    //                 'can_create' => false,
    //                 'can_edit' => false,
    //                 'can_delete' => false,
    //                 'can_view' => false,
    //             ]
    //         ]
    //     ],
    //     'references_management' => [
    //         'description' => 'References Management',
    //         'sections' => [
    //             'reference' => [
    //                 'can_create' => false,
    //                 'can_view' => false,
    //                 'can_edit' => false,
    //                 'can_delete' => false,
    //             ]
    //         ]
    //     ],
    // ];

    public function mount()
    {
        $this->permissions = Permission::all();
    }

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
            $role = Roles::updateOrCreate(
                ['id' => $this->roleId],
                [
                    'name' => $this->name
                ]
            );
            if ($role) {
                $selectedPermissions = array_keys(array_filter($this->permission, function ($value) {
                    return $value === true;
                }));
                $role->permissions()->sync($selectedPermissions);
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
            foreach ($role->permissions as $key => $permission) {
                $this->permission[$permission->id] = true;
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function resetComponent()
    {
        $this->resetExcept(['permissions']);
    }

    public function render()
    {
        return view('livewire.admin.roles.index', [
            'roles' => Roles::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
