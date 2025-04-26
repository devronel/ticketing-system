<?php

namespace App\Livewire\Admin\UserManagement;

use App\Models\Department;
use App\Models\Roles;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $isAddModalOpen = false;
    public $isEditModalOpen = false;
    public $departments = [];
    public $roles = [];

    public $userId;
    public $username;
    public $email;
    public $password;
    public $department;
    public $role;

    public function mount()
    {
        $this->departments = Department::where('status', true)->get();
        $this->roles = Roles::all();
    }

    public function save()
    {
        try {
            $user = new User();
            $user->username = $this->generatedUsername();
            $user->email = $this->email;
            $user->password = $this->password;
            $user->department_id = $this->department;
            $user->role_id = $this->role;
            if ($user->save()) {
                $this->resetComponent();
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function update()
    {
        try {
            $user = User::find($this->userId);
            $user->email = $this->email;
            $user->department_id = $this->department;
            $user->role_id = $this->role;
            if ($user->save()) {
                $this->resetComponent();
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function fetchEdit($id)
    {
        try {
            $this->isEditModalOpen = true;
            $user = User::find($id);
            $this->userId = $user->id;
            $this->email = $user->email;
            $this->department = $user->department_id;
            $this->role = $user->role_id;
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }


    public function generatedUsername()
    {
        return 'HC-USER-' . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
    }

    public function resetComponent()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.user-management.index', [
            'users' => User::with(['department', 'role'])->get()
        ]);
    }
}
