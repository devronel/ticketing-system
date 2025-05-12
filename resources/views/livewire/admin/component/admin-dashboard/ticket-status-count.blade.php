<div x-data="ticketCountStatus" class="mt-6">
    <div class=" bg-gray-100 border border-gray-300 shadow rounded p-3">
        <canvas id="ticketCountStatus"></canvas>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Alpine.data('ticketCountStatus', () => ({
                    ticketCountPerStatus: @entangle('ticketCountPerStatus'),
                    labels: [],
                    counts: [],
                    colors: [],
                    init(){

                        this.ticketCountPerStatus.forEach(value => {
                            this.labels.push(value.status)
                            this.counts.push(value.count)
                            this.colors.push(value.color)
                        });

                        const data = {
                            labels: this.labels,
                            datasets: [{
                                label: 'Tickets by Status',
                                data: this.counts,
                                backgroundColor: this.colors,
                                hoverOffset: 4
                            }]
                        };
                        const config = {
                            type: 'pie',
                            data: data,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                        text: 'Ticket Status Count'
                                    }
                                }
                            },
                        };
                        new Chart(document.getElementById('ticketCountStatus'), config)
                    }
                }))
            })
        </script>
    @endpush
</div>

{{-- 
    SELECT statusRef.name AS statusName, statusRef.color, COUNT(t.id) AS count
    FROM status_references statusRef
    LEFT JOIN tickets t ON t.status_id = statusRef.id
    GROUP BY statusRef.name;
--}}
