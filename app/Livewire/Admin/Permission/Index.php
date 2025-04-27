<?php

namespace App\Livewire\Admin\Permission;

use App\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $isAddModalOpen = false;

    public $permissionId;
    public $name;

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:permissions'
        ]);
        try {
            $role = Permission::updateOrCreate(
                ['id' => $this->permissionId],
                [
                    'name' => $this->name
                ]
            );
            if ($role) {
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
            $permission = Permission::find($id);
            $this->permissionId = $permission->id;
            $this->name = $permission->name;
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
        return view('livewire.admin.permission.index', [
            'permissions' => Permission::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
