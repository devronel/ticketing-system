<?php

namespace App\View\Components\Admin\UserManagement;

use App\Models\Department;
use App\Models\Roles;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditModal extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.user-management.edit-modal', [
            'departments' => Department::where('status', true)->get(),
            'roles' => Roles::all()
        ]);
    }
}
