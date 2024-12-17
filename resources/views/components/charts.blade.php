<div id="chart-container">
    <h1 id="title">Vues mensuelles pour l'année {{ $currentYear }}</h1>

    <div id="chart">
        <p id="nbr_view_per_months">Nombre de vue moyen par mois : {{$month_average_view}}</p>
        <canvas id="viewsChart" width="400" height="200"></canvas>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('viewsChart').getContext('2d');
            var viewsChart = new Chart(ctx, {
                type: 'bar', // Type de graphique : barre
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // Mois de l'année
                    datasets: [{
                        label: 'Vues par mois', // Légende
                        data: @json($viewsPerMonth), // Données des vues par mois
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Couleur de fond des barres
                        borderColor: 'rgba(75, 192, 192, 1)', // Couleur de la bordure des barres
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true // Commencer l'échelle Y à 0
                        }
                    }
                }
            });
        </script>
    </div>

</div>
