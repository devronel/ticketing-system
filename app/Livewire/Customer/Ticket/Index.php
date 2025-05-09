<?php

namespace App\Livewire\Customer\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{

    #[Layout('layouts.customer')]
    public function render()
    {
        // dd(Ticket::with(['status', 'department', 'priority', 'assignTo.userDetails'])->where('customer_id', Auth::id())->get());
        return view('livewire.customer.ticket.index', [
            'tickets' => Ticket::with(['status', 'department', 'priority', 'assignTo.userDetails'])->where('customer_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }
}
