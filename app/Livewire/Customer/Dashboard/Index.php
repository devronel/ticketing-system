<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.customer')]
    public function render()
    {
        return view('livewire.customer.dashboard.index');
    }
}
