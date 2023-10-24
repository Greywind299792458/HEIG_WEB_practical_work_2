<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starway Extravaganza</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100" rel="stylesheet">
    <link rel="stylesheet" href="views/styles/statistics.css">
    <link rel="stylesheet" href="views/styles/style.css">
</head>

<body>
    <header>
        <nav>
            <a href="index.php?page=home">Stairway Extravaganza</p>
                <a href="index.php?page=form-stairs">Ajouter un escalier</a>
                <a href="index.php?page=form-accidents">Report d'incident</a>
                <a href="index.php?page=map">Carte</a>
                <a href="index.php?page=statistics">Statistiques</a>
                <a href="index.php?page=list-stairs">Liste</a>
        </nav>
    </header>
    <main>
        <h1 class="container">Etat actuel de l'affrontement sans pitié entre escaliers pairs et impaires</h1>
        <section id="fight-section">
            <div>
                <h2>Nombe d'escalier impaires: <?php echo $oddOnes; ?></h2>
            </div>
            <div>
                <h2>Nombe d'escalier pairs: <?php echo $evenOnes; ?></h2>
            </div>
        </section>
        <h3>Fun fact: Quasimment tous les escaliers de la HEIG ont un nombre de marches qui est un nombre premier!</h3>
    </main>
</body>
<footer class="center">
    Ce site a été créé avec minutie par un Asperger qui adore compter les trucs et surtout les marches des escaliers.
    Qui aurait pensé que cette obsession deviendrait utile un jour pour un projet de WEB?
</footer>

</html>