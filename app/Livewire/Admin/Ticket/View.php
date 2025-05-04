<?php

namespace App\Livewire\Admin\Ticket;

use App\Models\Ticket;
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
        return view('livewire.admin.ticket.view');
    }
}
