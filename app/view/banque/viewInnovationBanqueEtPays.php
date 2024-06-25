<!-- ----- début viewAll -->
<?php

require($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<html>
<head>
    <style>
        .canvas-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0; /* Optionnel : Ajoute un peu de marge autour du graphique */
        }

        #pieChart {
            width: 600px; /* Ajustez les dimensions ici */
            height: 600px; /* Ajustez les dimensions ici */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container">
    <?php
    if ($_SESSION['user_info']['statut'] != 1) {
        include $root . '/app/view/fragment/fragmentPatrimoineMenuBoss.html';
    } else {
        include $root . '/app/view/fragment/fragmentPatrimoineMenuClient.php';
    }
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>

    <h2 style='color: red; text-align: center'>Nombre de banques par pays</h2><br/>

    <div class="canvas-container">
        <canvas id="pieChart"></canvas>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var ctx = document.getElementById('pieChart').getContext('2d');
            var pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($banquesParPays)); ?>,
                    datasets: [{
                        data: <?php echo json_encode(array_values($banquesParPays)); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Nombre de banques par pays'
                        }
                    }
                }
            });
        });
    </script>
</div>
<?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewAll -->
