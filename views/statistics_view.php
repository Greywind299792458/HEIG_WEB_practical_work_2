<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starway Extravaganza</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200" rel="stylesheet">
    <link rel="stylesheet" href="/views/styles/statistics.css">
    <link rel="stylesheet" href="/views/styles/style.css">
</head>

<body>
    <header>
        <nav>
            <a href="/">Stairway Extravaganza</a>
            <a href="/stairs/form">Ajouter un escalier</a>
            <a href="/statistics">Statistiques</a>
            <a href="/stairs/list">Liste</a>
        </nav>
    </header>
    <main>
        <h2 class="container center">Etat actuel de l'affrontement entre escaliers avec un nombre de marches pair et impair</h2>
        <section id="fight-section" class="center">
            <div>
                <h2>Nombre de marches impair: <?php echo $oddStepsCount; ?></h2>
            </div>
            <div>
                <h2>Nombre de marches pair: <?php echo $evenStepsCount; ?></h2>
            </div>
        </section>
        <p class="center">Complétez votre collection d'escaliers pour inverser la tendance!</p>
        <p class="center">Fun fact : Presque tous les escaliers de la HEIG ont un nombre de marches qui est un nombre premier!</p>
        <section id="other-section" class="center">
            <h3>Autres informations intéressantes</h3>
            <?php if (isset($mostFrequentSteps)) : ?>
                <div>
                    <p>Nombre de marches le plus fréquent : <?php echo $mostFrequentSteps; ?></p>
                </div>
            <?php endif; ?>
            <?php if (isset($leastFrequentSteps)) : ?>
                <div>
                    <p>Nombre de marches le moins fréquent : <?php echo $leastFrequentSteps; ?></p>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
<footer class="center">
    Ce site a été créé avec minutie par un Asperger qui adore compter les trucs et surtout les marches des escaliers.
    Qui aurait pensé que cette obsession deviendrait utile un jour pour un projet de WEB?
</footer>

</html>