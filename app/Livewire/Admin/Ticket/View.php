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
    public $status;
    public $priority;
    public $agent;
    public $message;

    public function mount($id)
    {
        $this->ticketId = $id;
        $ticket = Ticket::with(['status', 'priority', 'department', 'assignTo.userDetails'])->find($id);
        $this->status = $ticket->status_id;
        $this->priority = $ticket->priority_id;
        $this->agent = $ticket->assigned_to;
    }

    public function updating($property, $value)
    {
        $ticket = Ticket::where('id', $this->ticketId);
        switch ($property) {
            case 'status':
                $ticket->update(['status_id' => $value]);
                break;
            case 'priority':
                $ticket->update(['priority_id' => $value]);
                break;
            case 'agent':
                $ticket->update(['assigned_to' => $value]);
                break;
            default:
                # code...
                break;
        }
    }

    public function sendMessage()
    {
        dd($this->message);
    }

    public function render()
    {
        return view('livewire.admin.ticket.view', [
            'ticket' => Ticket::with(['status', 'priority', 'department', 'assignTo'])->find($this->ticketId),
            'statuses' => StatusReference::all(),
            'priorities' => PriorityReference::all(),
            'agents' => User::with(['userDetails'])->where('role_id', 3)->get(),
        ]);
    }
}
