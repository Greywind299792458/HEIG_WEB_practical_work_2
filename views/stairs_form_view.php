<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starway Extravaganza</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/views/styles/form.css">
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
        <section id="form-section">
            <h1>Ajouter un escalier</h1>
            <form action="/stairs/form" method="post">
                <?php if (isset($data['id'])) : ?>
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <?php endif; ?>
                <div>
                    <label for="stairs-name"><i class="bi bi-book"></i>Nom</label>
                    <input type="text" id="stairs-name" name="stairsName" value="<?php echo isset($data['stairs_name']) ? $data['stairs_name'] : ''; ?>" required>
                </div>
                <div>
                    <label for="num-steps"><i class="bi bi-speedometer2"></i>Nombre de marches</label>
                    <input value="5" type="number" min="0" id="num-steps" name="numSteps" value="<?php echo isset($data['num_steps']) ? $data['num_steps'] : ''; ?>" required>
                </div>
                <div>
                    <label for="is-indoor"><i class="bi bi-house"></i>Escalier intérieur</label>
                    <input type="checkbox" id="is-indoor" name="isIndoor" <?php echo isset($data['is_indoor']) && $data['is_indoor'] ? 'checked' : ''; ?>>
                </div>
                <div>
                    <label for="building-name"> <i class="bi bi-building"></i>Bâtiment</label>
                    <input type="text" id="building-name" name="buildingName" value="<?php echo isset($data['building_name']) ? $data['building_name'] : ''; ?>">
                </div>
                <div>
                    <label for="num-steps"><i class="bi bi-sort-numeric-up"></i>Etage de départ</label>
                    <input type="text" id="starting-level" name="startingLevel" value="<?php echo isset($data['starting_level']) ? $data['starting_level'] : ''; ?>" required>
                </div>
                <div>
                    <label for="special-feature"><i class="bi bi-chat-left-dots"></i>Particularité</label>
                    <textarea id="special-feature" name="specialFeature">
                        <?php echo isset($data['special_feature']) ? $data['special_feature'] : ''; ?>
                    </textarea>
                </div>
                <input class="btn" id="btn-send" type="submit" value="Submit">
            </form>
            <div id="results">
                <?php
                if (isset($success) && $success === "true") {
                    echo '<p style="color: green;">Le formulaire a été soumis avec succès!</p>';
                }
                if (isset($error) && $error !== "") {
                    echo '<p style="color: red;">' . $error . '</p>';
                }
                ?>
            </div>
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
<footer class="center fixed-footer">
    Ce site a été créé avec minutie par un Asperger qui adore compter les trucs et surtout les marches des escaliers.
    Qui aurait pensé que cette obsession deviendrait utile un jour pour un projet de WEB?
</footer>

</html>