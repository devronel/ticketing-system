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
        return view('livewire.customer.ticket.index', [
            'tickets' => Ticket::with(['status', 'department'])->where('customer_id', Auth::id())->get()
        ]);
    }
}
