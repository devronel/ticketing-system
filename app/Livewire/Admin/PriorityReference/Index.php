<?php

namespace App\Livewire\Admin\PriorityReference;

use App\Models\PriorityReference;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.priority-reference.index', [
            'priorities' => PriorityReference::all()
        ]);
    }
}
