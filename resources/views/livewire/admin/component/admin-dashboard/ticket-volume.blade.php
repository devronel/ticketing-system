<div x-data="ticketVolume" class="mt-6">
    <div class=" bg-gray-100 border border-gray-300 shadow rounded p-3">
        <div>
            <p class=" font-bold">Date Range</p>
            <div class="flex items-center gap-2">
                <div class=" flex-shrink">
                    <x-forms.input-field type="date" wire:model.live.debounce.250ms="startDate" />
                </div>
                <p class="text-sm">To</p>
                <div class=" flex-shrink">
                    <x-forms.input-field type="date" wire:model.live.debounce.250ms="endDate" />
                </div>
            </div>
        </div>
        <div wire:ignore>
            <canvas id="ticketVolume"></canvas>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Alpine.data('ticketVolume', () => ({
                    ticketCountPerDate: @entangle('ticketCountPerDate'),
                    startDate: @entangle('startDate'),
                    endDate: @entangle('endDate'),
                    ticketDate: [],
                    ticketCount: [],
                    init(){
                        let chartInstance;
                        const lineChartId = document.getElementById('ticketVolume')
                        this.ticketCountPerDate.forEach(value => {
                            this.ticketDate.push(value.date)
                            this.ticketCount.push(value.count)
                        });
                        const config = {
                            type: 'line',
                            data: {
                                labels: this.ticketDate,
                                datasets: [
                                    {
                                        label: 'Ticket',
                                        data: this.ticketCount,
                                        borderColor: [],
                                        backgroundColor: [],
                                        pointStyle: 'circle',
                                        pointRadius: 10,
                                        pointHoverRadius: 15
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                title: {
                                    display: true,
                                    text: (ctx) => 'Ticket Volume',
                                }
                                }
                            }
                        };

                        chartInstance = new Chart(lineChartId, config)

                        Livewire.on('refresh-chart', () => {
                            if(chartInstance){
                                chartInstance.destroy()
                            }
                            chartInstance = new Chart(lineChartId, config)
                        })
                    },
                }))
            })
        </script>
    @endpush
</div>