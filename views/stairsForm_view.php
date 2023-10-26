<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starway Extravaganza</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200" rel="stylesheet">
    <link rel="stylesheet" href="views/styles/stairsForm.css">
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
        <section id="form-section">
            <h1>Ajouter un escalier</h1>
            <form action="submit.php" method="post">
                <div>
                    <label for="stairs-name">Nom</label>
                    <input type="text" id="stairs-name" name="stairsName" required>
                </div>
                <div>
                    <label for="num-steps">Nombre de marches</label>
                    <input value="5" type="number" min="0" id="num-steps" name="numSteps" required>
                </div>
                <div>
                    <label for="is-indoor">Escalier intérieur</label>
                    <input type="checkbox" id="is-indoor" name="isIndoor" checked="true" required>
                </div>
                <div>
                    <label for="building-name">Bâtiment</label>
                    <input type="text" id="building-name" name="buildingName">
                </div>
                <div>
                    <label for="num-steps">Etape de départ</label>
                    <input type="number" id="starting-level" name="startingLevel" required>
                </div>
                <div>
                    <label for="rating">Evaluation</label>
                    <select name="rating" id="rating">
                        <option value="argh">argh</option>
                        <option value="meh">meh</option>
                        <option value="ok">ok</option>
                        <option value="wee">wee</option>
                    </select required>
                </div>
                <div>
                    <label for="special-feature">Particularité</label>
                    <textarea id="special-feature" name="specialFeature"></textarea>
                </div>
                <input class="btn" id="btn-send" type="submit" value="Submit">
            </form>
        </section>
    </main>
</body>
<footer class="center">
    Ce site a été créé avec minutie par un Asperger qui adore compter les trucs et surtout les marches des escaliers.
    Qui aurait pensé que cette obsession deviendrait utile un jour pour un projet de WEB?
</footer>

</html>