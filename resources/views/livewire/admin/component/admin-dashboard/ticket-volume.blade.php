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
        <div wire:ignore class="">
            <canvas id="ticketVolume"></canvas>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Alpine.data('ticketVolume', () => ({
                    init(){

                        let chartInstance;
                        const lineChartId = document.getElementById('ticketVolume')

                        const config = {
                            type: 'line',
                            data: @this.chartData,
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

                        Livewire.on('refresh-chart', (event) => {
                            console.log(event)
                            chartInstance.data = event.chartData
                            chartInstance.update()
                        })
                    },
                }))
            })
        </script>
    @endpush
</div>