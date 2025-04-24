<?php

namespace App\Livewire\Admin\UserManagement;

use App\Models\Department;
use App\Models\Roles;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $isAddModalOpen = true;
    public $departments;
    public $roles;

    public function mount()
    {
        $this->departments = Department::where('status', true)->get();
        $this->roles = Roles::where('status', true)->get();
    }

    public function resetComponent()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.user-management.index', [
            'users' => User::all()
        ]);
    }
}
