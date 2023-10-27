<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starway Extravaganza</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200" rel="stylesheet">
    <link rel="stylesheet" href="views/styles/statistics.css">
    <link rel="stylesheet" href="views/styles/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
</head>

<body>
    <header>
        <nav>
            <a href="/">Stairway Extravaganza</a>
            <a href="/stairs-form">Ajouter un escalier</a>
            <a>Report d'incident</a>
            <a>Carte</a>
            <a href="/statistics">Statistiques</a>
            <a href="/stairs-list">Liste</a>
        </nav>
    </header>
    <main>
        <h2 class="container center">Etat actuel de l'affrontement entre escaliers avec un nombre de marches pair et impair</h2>
        <section id="fight-section" class="center">
            <div>
                <h2>Nombre de marches impair: <?php echo $oddOnes; ?></h2>
            </div>
            <div>
                <h2>Nombre de marches pair: <?php echo $evenOnes; ?></h2>
            </div>
        </section>
        <section>
            <canvas id="pieChart" style="width:100%;max-width:700px"></canvas>
        </section>
        <section>
            <canvas id="linearChart" style="width:100%;max-width:700px"></canvas>
        </section>
        <h3 class="center">Complétez votre collection d'escaliers pour inverser la tendance!</h3>
        <h4 class="center">Fun fact: Presque tous les escaliers de la HEIG ont un nombre de marches qui est un nombre premier!</h4>
    </main>
</body>
<footer class="center">
    Ce site a été créé avec minutie par un Asperger qui adore compter les trucs et surtout les marches des escaliers.
    Qui aurait pensé que cette obsession deviendrait utile un jour pour un projet de WEB?
</footer>

<script>
    new Chart("pieChart", {
        type: "pie",
        data: {
            labels: ["Intérieur", "Extérieur"],
            datasets: [{
                backgroundColor: ["#b91d47", "#00aba9"],
                data: ["<?php echo $indoors; ?>", "<?php echo $outdoors; ?>"]
            }]
        },
        options: {
            title: {
                display: true,
                text: "Escaliers interieurs vs exterieurs",
                fontColor: "white",
                fontSize: 18
            },
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 15
                }
            }
        }
    });
    new Chart("linearChart", {
        type: "line",
        data: {
            labels: [5, 10, 15, 20, 15],
            datasets: [{
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgba(0,0,255,0.1)",
                data: <?php echo json_encode($stepNumbers, JSON_NUMERIC_CHECK); ?>
            }]
        },
        options: {
            title: {
                display: true,
                text: "Nombre de marches",
                fontColor: "white",
                fontSize: 18
            },
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 15
                }
            }
        }
    });
</script>

</html>