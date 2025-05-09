<?php

namespace App\Livewire\Customer\Ticket;

use App\Models\Department;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Edit extends Component
{
    public $ticketId;
    public $subject;
    public $department;
    public $description;

    public function mount($id)
    {
        $this->ticketId = $id;
        $ticket = Ticket::find($id);
        $this->subject = $ticket->subject;
        $this->department = $ticket->department_id;
        $this->description = $ticket->description;
        $this->dispatch('fetch-summernote-value', content: $ticket->description);
    }

    public function save()
    {
        try {
            $ticket = Ticket::find($this->ticketId);
            $ticket->department_id = $this->department;
            $ticket->subject = $this->subject;
            $ticket->description = $this->description;
            if ($ticket->save()) {
                $this->dispatch('alert-on', title: 'Update', message: 'Ticket Updated Successfully', icon: 'success');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function resetComponent()
    {
        $this->reset();
    }

    #[Layout('layouts.customer')]
    public function render()
    {
        return view('livewire.customer.ticket.edit', [
            'departments' => Department::where('status', 1)->get()
        ]);
    }
}
