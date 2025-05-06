<?php

namespace App\Livewire\Admin\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyTicket extends Component
{
    public function render()
    {
        return view('livewire.admin.ticket.my-ticket', [
            'tickets' => Ticket::with(['status', 'priority', 'department', 'customer.userDetails', 'assignTo.userDetails'])
                ->where('assigned_to', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }
}
