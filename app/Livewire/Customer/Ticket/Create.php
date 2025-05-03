<?php

namespace App\Livewire\Customer\Ticket;

use App\Models\Department;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{

    public $subject;
    public $department;
    public $description;

    public function save()
    {
        try {
            $ticket = new Ticket();
            $ticket->customer_id = Auth::id();
            $ticket->department_id = $this->department;
            $ticket->subject = $this->subject;
            $ticket->description = $this->description;
            if ($ticket->save()) {
                $this->reset();
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
        return view('livewire.customer.ticket.create', [
            'departments' => Department::where('status', 1)->get()
        ]);
    }
}
