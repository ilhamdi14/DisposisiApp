<div class="container mt-5">
        <h3 class="text-center">Laravel 12 ChartJS Example</h3>
        <div class="card mt-4">
            <div class="card-body">
                <canvas id="myChart" height="100"></canvas>
            </div>
        </div>
    </div>
    
    <script>
        // Get the canvas element
        const ctx = document.getElementById('myChart').getContext('2d');
        
        // Create the bar chart
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: 'Monthly Data',
                    data: @json($data['values']),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>