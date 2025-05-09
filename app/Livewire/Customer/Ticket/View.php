<?php

namespace App\Livewire\Customer\Ticket;

use App\Models\PriorityReference;
use App\Models\StatusReference;
use App\Models\Ticket;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class View extends Component
{
    public $ticketId;

    public function mount($id)
    {
        $this->ticketId = $id;
    }

    #[Layout('layouts.customer')]
    public function render()
    {
        return view('livewire.customer.ticket.view', [
            'ticket' => Ticket::with(['status', 'priority', 'department', 'assignTo'])->find($this->ticketId),
            'statuses' => StatusReference::all(),
            'priorities' => PriorityReference::all(),
            'agents' => User::with(['userDetails'])->where('role_id', 3)->get(),
        ]);
    }
}
