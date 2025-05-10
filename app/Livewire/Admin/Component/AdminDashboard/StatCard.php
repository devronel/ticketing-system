<?php

namespace App\Livewire\Admin\Component\AdminDashboard;

use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;

class StatCard extends Component
{

    public $countTicket;
    public $countUser;

    public function mount()
    {
        $this->countTicket = Ticket::count();
        $this->countUser = User::selectRaw("
            COUNT(*) as total_users,
            SUM(CASE WHEN role_id = 4 THEN 1 ELSE 0 END) as total_customers,
            SUM(CASE WHEN role_id = 3 THEN 1 ELSE 0 END) as total_agents
        ")->first();
    }

    public function render()
    {
        return view('livewire.admin.component.admin-dashboard.stat-card');
    }
}
