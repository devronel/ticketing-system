<?php

namespace App\Livewire\Customer\Task;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.customer')]
    public function render()
    {
        return view('livewire.customer.task.index');
    }
}
