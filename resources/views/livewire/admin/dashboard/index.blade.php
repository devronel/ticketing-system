
<div>
    @push('scripts')
        @vite(['resources/js/chart.js'])
    @endpush
    <x-admin.page-title title="Dashboard" />
    <livewire:admin.component.admin-dashboard.stat-card />
    <div class="grid grid-cols-2 gap-3">
        <livewire:admin.component.admin-dashboard.ticket-status-count />
    </div>
    <div>
        <livewire:admin.component.admin-dashboard.ticket-volume />
    </div>
</div>
  