<?php

namespace App\Livewire\Admin\Component\Ticket;

use App\Events\TicketMessageEvent;
use App\Models\TicketMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ChatBox extends Component
{

    use WithPagination;

    public $isChatBoxOpen = false;

    public $ticketId;
    public $message;

    public function sendMessage()
    {
        $this->validate([
            'message' => 'required'
        ]);
        try {
            $ticket = new TicketMessage();
            $ticket->sender_id = Auth::id();
            $ticket->ticket_id = $this->ticketId;
            $ticket->message = $this->message;
            if ($ticket->save()) {
                $this->reset(['message']);
                $newMessage = TicketMessage::with(['sender.userDetails'])->where('id', $ticket->id)->first();
                TicketMessageEvent::broadcast($this->ticketId, Auth::id(), $newMessage);
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function resetComponent()
    {
        $this->reset(['message']);
    }

    public function render()
    {
        return view('livewire.admin.component.ticket.chat-box');
    }
}
