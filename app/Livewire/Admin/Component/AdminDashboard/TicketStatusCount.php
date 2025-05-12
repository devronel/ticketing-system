<?php

namespace App\Livewire\Admin\Component\AdminDashboard;

use App\Models\StatusReference;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TicketStatusCount extends Component
{
    public $ticketCountPerStatus;

    public function mount()
    {
        $this->ticketCountPerStatus = DB::table('status_references')
            ->leftJoin('tickets', 'status_references.id', '=', 'tickets.status_id')
            ->select('status_references.name as status', 'status_references.color', DB::raw('COUNT(tickets.id) as count'))
            ->groupBy('status_references.name', 'status_references.color')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.component.admin-dashboard.ticket-status-count');
    }
}
