<?php

namespace App\Livewire\Admin\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.ticket.index', [
            'tickets' => Ticket::with(['status', 'priority', 'department', 'customer.userDetails', 'assignTo.userDetails'])->orderBy('created_at', 'desc')->get()
        ]);
    }
}
