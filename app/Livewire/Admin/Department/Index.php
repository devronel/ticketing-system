<?php

namespace App\Livewire\Admin\Department;

use App\Models\Department;
use Livewire\Component;

class Index extends Component
{

    public $isAddModalOpen = false;

    public $departmentId;
    public $name;

    public function save()
    {
        try {
            $department = Department::updateOrCreate(
                ['id' => $this->departmentId],
                ['name' => $this->name]
            );
            if ($department) {
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
            $department = Department::find($id);
            $this->departmentId = $department->id;
            $this->name = $department->name;
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
        return view('livewire.admin.department.index', [
            'departments' => Department::all()
        ]);
    }
}
