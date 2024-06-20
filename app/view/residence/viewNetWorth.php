<!-- ----- début viewNetWorth.php ----- -->
<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<html>
<head>
    <style>
        #barChart {
            width: 800px; /* Ajustez les dimensions ici */
            height: 400px; /* Ajustez les dimensions ici */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
</html>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenuBoss.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>

    <h2 style='color: red; text-align: center'>Forbes Richest Personalities</h2><br/>

    <canvas id="barChart"></canvas>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var ctx = document.getElementById('barChart').getContext('2d');

            var labels = <?php echo json_encode(array_map(function($result) {
                return $result['prenom'] . ' ' . $result['nom'];
            }, $results)); ?>;

            var data = <?php echo json_encode(array_map(function($result) {
                return $result['patrimoine_total'];
            }, $results)); ?>;

            var barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Net Worth',
                        data: data,
                        backgroundColor: 'rgb(81,133,236, 0.3)',
                        borderColor: 'rgb(81,133,236, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Classement des personnes les plus riches'
                        }
                    }
                }
            });
        });
    </script>

</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewNetWorth.php ----- -->
