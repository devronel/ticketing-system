<?php

namespace App\Livewire\Admin\Component\AdminDashboard;

use App\Models\Ticket;
use Carbon\Carbon;
use Livewire\Component;

class TicketVolume extends Component
{

    public $chartData;
    public $ticketCountPerDate = [];
    public $startDate;
    public $endDate;

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


        // $ticketCounts = Ticket::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count")
        //     ->whereDate('created_at', '>=', now()->subMonths(5)->startOfMonth()) // includes current month + last 5
        //     ->groupByRaw("DATE_FORMAT(created_at, '%Y-%m')")
        //     ->orderByRaw("DATE_FORMAT(created_at, '%Y-%m')")
        //     ->pluck('count', 'month');

        // dd($ticketCounts);

        // $startMonth = now()->subMonths(5)->startOfMonth(); // 6 months ago
        // $endMonth = now()->startOfMonth();

        // for ($month = $startMonth->copy(); $month->lte($endMonth); $month->addMonth()) {
        //     $formatted = $month->format('Y-m');
        //     $this->ticketCountPerDate[] = [
        //         'date' => $formatted,
        //         'count' => $ticketCounts->get($formatted, 0)
        //     ];
        // }
        $startDate = now()->startOfMonth();
        $this->startDate = $startDate->toDateString();
        $this->endDate = $startDate->addDay(10)->toDateString();
        $this->chartData = $this->getTicketVolume();
    }

    public function updated($property, $value)
    {
        if ($property == 'endDate') {
            $this->endDate = $value;
        }

        if ($property == 'startDate') {
            $this->startDate = $value;
        }


        $this->chartData = $this->getTicketVolume();
        $this->dispatch('refresh-chart', chartData: $this->chartData);
    }

    public function getTicketVolume()
    {
        try {
            $stDate = Carbon::parse($this->startDate);
            $edDate = Carbon::parse($this->endDate);
            $dates = [];
            $counts = [];
            $tickets = Ticket::whereBetween('created_at', [$stDate, $edDate])->get();
            for ($day = $stDate->copy(); $day->lte($edDate); $day->addDay()) {
                $dateString = $day->format('Y-m-d');

                $count = $tickets->filter(function ($ticket) use ($dateString) {
                    return $ticket->created_at->format('Y-m-d') === $dateString;
                })->count();

                $dates[] = $dateString;
                $counts[] = $count;
            }

            return [
                'labels' => $dates,
                'datasets' => [
                    [
                        'label' => 'Ticket',
                        'data' => $counts,
                        'borderColor' =>  '#EAB308',
                        'backgroundColor' => '#F59E0B',
                        'pointStyle' => 'circle',
                        'pointRadius' => 7,
                        'pointHoverRadius' => 10
                    ]
                ]
            ];
        } catch (\Throwable $th) {
            $this->dispatch('alert-on', title: 'Error', message: $th->getMessage(), icon: 'error');
        }
    }

    public function render()
    {
        // $this->getTicketVolumn($this->startDate, $this->endDate);
        return view('livewire.admin.component.admin-dashboard.ticket-volume');
    }
}
