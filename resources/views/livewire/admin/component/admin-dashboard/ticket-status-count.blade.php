<div x-data="ticketCountStatus" class="mt-6">
    <div class=" bg-gray-100 border border-gray-300 shadow rounded p-3">
        <canvas id="ticketCountStatus"></canvas>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Alpine.data('ticketCountStatus', () => ({
                    init(){
                        const data = {
                            labels: [
                                'Red',
                                'Blue',
                                'Yellow'
                            ],
                            datasets: [{
                                label: 'My First Dataset',
                                data: [300, 50, 100],
                                backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 205, 86)'
                                ],
                                hoverOffset: 4
                            }]
                        };
                        const config = {
                            type: 'doughnut',
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
