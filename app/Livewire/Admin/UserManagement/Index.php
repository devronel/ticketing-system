<?php

namespace App\Livewire\Admin\UserManagement;

use App\Models\Department;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
    public $firstName;
    public $middleName;
    public $lastName;
    public $gender;
    public $dateOfBirth;
    public $civilStatus;
    public $address;

    public function mount()
    {
        $this->departments = Department::where('status', true)->get();
        $this->roles = Roles::all();
    }

    public function save()
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->username = $this->generatedUsername();
            $user->email = $this->email;
            $user->password = $this->password;
            $user->department_id = $this->department;
            $user->role_id = $this->role;
            if ($user->save()) {
                $user->userDetails()->create([
                    'user_id' => $user->id,
                    'first_name' => $this->firstName,
                    'middle_name' => $this->middleName,
                    'last_name' => $this->lastName,
                    'gender' => $this->gender,
                    'date_of_birth' => $this->dateOfBirth,
                    'civil_status' => $this->civilStatus,
                    'address' => $this->address,
                ]);
                DB::commit();
                $this->resetComponent();
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }

    public function update()
    {
        DB::beginTransaction();
        try {
            $user = User::find($this->userId);
            $user->email = $this->email;
            $user->department_id = $this->department;
            $user->role_id = $this->role;
            if ($user->save()) {
                $user->userDetails()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'first_name' => $this->firstName,
                        'middle_name' => $this->middleName,
                        'last_name' => $this->lastName,
                        'gender' => $this->gender,
                        'date_of_birth' => $this->dateOfBirth,
                        'civil_status' => $this->civilStatus,
                        'address' => $this->address,
                    ]
                );
                DB::commit();
                $this->resetComponent();
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }

    public function fetchEdit($id)
    {
        try {
            $this->isEditModalOpen = true;
            $user = User::with(['userDetails'])->find($id);
            $this->userId = $user->id;
            $this->email = $user->email;
            $this->department = $user->department_id;
            $this->role = $user->role_id;
            $this->firstName = $user->userDetails->first_name ?? '';
            $this->middleName = $user->userDetails->middle_name ?? '';
            $this->lastName = $user->userDetails->last_name ?? '';
            $this->dateOfBirth = $user->userDetails->date_of_birth ?? '';
            $this->gender = $user->userDetails->gender ?? '';
            $this->civilStatus = $user->userDetails->civil_status ?? '';
            $this->address = $user->userDetails->address ?? '';
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
            'users' => User::with(['department', 'role', 'userDetails'])->get()
        ]);
    }
}
