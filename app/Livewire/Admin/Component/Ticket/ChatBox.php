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

    public $paginatePage = 5;
    public $ticketId;
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

    public function incrementPage()
    {
        $this->paginatePage = $this->paginatePage + 5;
    }

    public function pageReset()
    {
        $this->paginatePage = 5;
        $this->resetPage();
    }

    public function resetComponent()
    {
        $this->reset(['message']);
    }

    public function render()
    {
        $messages = TicketMessage::with(['sender.userDetails'])->where('ticket_id', $this->ticketId)
            ->orderBy('created_at', 'desc')
            ->cursorPaginate($this->paginatePage)
            ->reverse();
        $groupedByDate = $messages->groupBy(function ($message) {
            return \Carbon\Carbon::parse($message->created_at)->toDateString();
        });
        return view('livewire.admin.component.ticket.chat-box', [
            'messages' => $groupedByDate
        ]);
    }
}
