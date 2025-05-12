<?php

namespace App\Livewire\Admin\Component\AdminDashboard;

use App\Models\Ticket;
use Carbon\Carbon;
use Livewire\Component;

class TicketVolume extends Component
{

    public $ticketCountPerDate = [];

    public function mount()
    {
        // Step 1: Get raw counts from DB
        // $ticketCounts = Ticket::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        //     ->whereDate('created_at', '>=', now()->subDays(6)->toDateString()) // last 7 days including today
        //     ->groupByRaw('DATE(created_at)')
        //     ->orderByRaw('DATE(created_at)')
        //     ->pluck('count', 'date'); // ['2025-05-04' => 12, '2025-05-06' => 8]

        // // Step 2: Generate full date range (last 7 days)
        // $startDate = Carbon::now()->subDays(6);
        // $endDate = Carbon::now();

        // for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
        //     $this->ticketCountPerDate[] = [
        //         'date' => $date->toDateString(),
        //         'count' => $ticketCounts->get($date->toDateString(), 0)
        //     ];
        // }

        $ticketCounts = \App\Models\Ticket::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count")
            ->whereDate('created_at', '>=', now()->subMonths(5)->startOfMonth()) // includes current month + last 5
            ->groupByRaw("DATE_FORMAT(created_at, '%Y-%m')")
            ->orderByRaw("DATE_FORMAT(created_at, '%Y-%m')")
            ->pluck('count', 'month');

        $startMonth = now()->subMonths(5)->startOfMonth(); // 6 months ago
        $endMonth = now()->startOfMonth(); // current month

        for ($month = $startMonth->copy(); $month->lte($endMonth); $month->addMonth()) {
            $formatted = $month->format('Y-m');
            $this->ticketCountPerDate[] = [
                'date' => $formatted,
                'count' => $ticketCounts->get($formatted, 0)
            ];
        }
    }

    public function render()
    {
        return view('livewire.admin.component.admin-dashboard.ticket-volume');
    }
}
