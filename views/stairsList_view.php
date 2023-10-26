<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starway Extravaganza</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200" rel="stylesheet">
    <link rel="stylesheet" href="views/styles/stairsList.css">
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
        <h1 class="container">Liste des escaliers</h1>
        <section class="container" id="table-section">
            <div id="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Nombre de marches</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= htmlspecialchars($row['stairs_name']) ?></td>
                                <td><?= htmlspecialchars($row['num_steps']) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
<footer class="center">
    Ce site a été créé avec minutie par un Asperger qui adore compter les trucs et surtout les marches des escaliers.
    Qui aurait pensé que cette obsession deviendrait utile un jour pour un projet de WEB?
</footer>

</html>