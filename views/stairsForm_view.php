<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starway Extravaganza</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="views/styles/stairsForm.css">
    <link rel="stylesheet" href="views/styles/style.css">
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
        <section id="form-section">
            <h1>Ajouter un escalier</h1>
            <form action="process-form" method="post">
                <div>
                    <label for="stairs-name"><i class="bi bi-book"></i> Nom</label>
                    <input type="text" id="stairs-name" name="stairsName" required>
                </div>
                <div>
                    <label for="num-steps"><i class="bi bi-speedometer2"></i> Nombre de marches</label>
                    <input value="5" type="number" min="0" id="num-steps" name="numSteps" required>
                </div>
                <div>
                    <label for="is-indoor"><i class="bi bi-house"></i> Escalier intérieur</label>
                    <input type="checkbox" id="is-indoor" name="isIndoor" checked="true">
                </div>
                <div>
                    <label for="building-name"> <i class="bi bi-building"></i>Bâtiment</label>
                    <input type="text" id="building-name" name="buildingName">
                </div>
                <div>
                    <label for="num-steps"><i class="bi bi-sort-numeric-up"></i> Etape de départ</label>
                    <input type="text" id="starting-level" name="startingLevel" required>
                </div>
                <div>
                    <label for="rating"><i class="bi bi-emoji-smile-fill"></i> Evaluation</label>
                    <select name="rating" id="rating">
                        <option value="le pire">le pire</option>
                        <option value="bof">bof</option>
                        <option value="meh">meh</option>
                        <option value="epic">epic</option>
                    </select required>
                </div>
                <div>
                    <label for="special-feature"><i class="bi bi-chat-left-dots"></i> Particularité</label>
                    <textarea id="special-feature" name="specialFeature"></textarea>
                </div>
                <input class="btn" id="btn-send" type="submit" value="Submit">
            </form>
            <div id="instructions">
                <h2>Indications</h2>
                <h4>N'est PAS un escalier si:</h4>
                <ul>
                    <li>Il n'a qu'une seule marche (c'est un trottoir ça)</li>
                    <li>Gimli ne peut pas descendre les marches tout seul (CAR ON NE JETTE PAS UN NAIN)</li>
                    <li>Les marches bougent (ça c'est un escalator voyons, faites un effort!)</li>
                    <li>Il respire (c'est Victor, je sais il est grand mais quand même)</li>
                    <li>Il est apparu dans votre maison et semble être sans fin, vous entendez des voix familières provenant du fond, fuyez.</li>
                </ul>
            </div>
        </section>
    </main>
</body>
<footer class="center">
    Ce site a été créé avec minutie par un Asperger qui adore compter les trucs et surtout les marches des escaliers.
    Qui aurait pensé que cette obsession deviendrait utile un jour pour un projet de WEB?
</footer>

</html>