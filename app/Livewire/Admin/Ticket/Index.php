<?php

namespace App\Livewire\Admin\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        // $customer = Ticket::with(['status', 'department', 'customer.userDetails'])->get();
        return view('livewire.admin.ticket.index', [
            'tickets' => Ticket::with(['status', 'department', 'customer.userDetails'])->get()
        ]);
    }
}
