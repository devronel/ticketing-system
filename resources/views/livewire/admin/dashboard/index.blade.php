
<div>
    @push('scripts')
        @vite(['resources/js/chart.js'])
    @endpush
    <x-admin.page-title title="Dashboard" />
    <livewire:admin.component.admin-dashboard.stat-card />
    <div class="grid grid-cols-3 gap-3 mt-6">
        <div class=" col-span-2">
            <livewire:admin.component.admin-dashboard.ticket-status-count />
        </div>
        <livewire:admin.component.admin-dashboard.daily-ticket-list />
    </div>
    <div>
        <livewire:admin.component.admin-dashboard.ticket-volume />
    </div>
</div>
  