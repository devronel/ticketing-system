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

    public $ticketId;
    // public $messages;
    public $message;

    public function sendMessage()
    {
        try {
            $ticket = new TicketMessage();
            $ticket->sender_id = Auth::id();
            $ticket->ticket_id = $this->ticketId;
            $ticket->message = $this->message;
            if ($ticket->save()) {
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
        // $this->messages = TicketMessage::with(['sender.userDetails'])->where('ticket_id', $this->ticketId)
        //     ->limit(10)
        //     ->orderBy('created_at', 'desc')
        //     ->get();
        $msg = TicketMessage::with(['sender.userDetails'])->where('ticket_id', $this->ticketId)
            ->orderBy('created_at', 'desc')
            ->cursorPaginate(5);
        // dd($msg);
        return view('livewire.admin.component.ticket.chat-box', [
            'messages' => TicketMessage::with(['sender.userDetails'])->where('ticket_id', $this->ticketId)
                ->orderBy('created_at', 'desc')
                ->cursorPaginate(5)
        ]);
    }
}
