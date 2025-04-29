<?php

namespace App\Livewire\Customer\Ticket;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{

    public $subject;
    public $description;

    public function save()
    {
        dd($this->description);
    }

    #[Layout('layouts.customer')]
    public function render()
    {
        return view('livewire.customer.ticket.create');
    }
}
