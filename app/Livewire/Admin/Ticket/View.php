<?php

namespace App\Livewire\Admin\Ticket;

use App\Models\PriorityReference;
use App\Models\StatusReference;
use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;

class View extends Component
{

    public $ticketId;
    public $ticket;

    public function mount($id)
    {
        $this->ticketId = $id;
        $this->ticket = Ticket::with(['status', 'priority', 'department', 'assignTo'])->find($id);
    }

    public function render()
    {
        return view('livewire.admin.ticket.view', [
            'statuses' => StatusReference::all(),
            'priorities' => PriorityReference::all(),
            'agents' => User::with(['userDetails'])->where('role_id', 3)->get(),
        ]);
    }
}
