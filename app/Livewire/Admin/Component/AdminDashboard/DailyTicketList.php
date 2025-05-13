<?php

namespace App\Livewire\Admin\Component\AdminDashboard;

use App\Models\Ticket;
use Livewire\Component;

class DailyTicketList extends Component
{

    public $todaysTicket;

    public function mount()
    {
        $this->todaysTicket = Ticket::with(['customer'])
            ->whereDate('created_at', now()->toDateString())
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.component.admin-dashboard.daily-ticket-list');
    }
}
