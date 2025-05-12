<div x-data="ticketVolume" class="mt-6">
    <div class=" bg-gray-100 border border-gray-300 shadow rounded p-3">
        <canvas id="ticketVolume"></canvas>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Alpine.data('ticketVolume', () => ({
                    ticketCountPerDate: @entangle('ticketCountPerDate'),
                    ticketDate: [],
                    ticketCount: [],
                    init(){
                        console.log(this.ticketCountPerDate)
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

                        new Chart(document.getElementById('ticketVolume'), config)
                    }
                }))
            })
        </script>
    @endpush
</div>