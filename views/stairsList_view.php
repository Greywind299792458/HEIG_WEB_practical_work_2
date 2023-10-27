<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starway Extravaganza</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="views/styles/stairsList.css">
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
        <h1 class="container">Liste des escaliers</h1>
        <section class="container" id="table-section">
            <div id="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Nombre de marches</th>
                            <th>Escalier intérieur</th>
                            <th>Bâtiment</th>
                            <th>Etage de départ</th>
                            <th>Note</th>
                            <th>Particularité</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $row['stairs_name'] ?></td>
                                <td><?= $row['num_steps'] ?></td>
                                <td><?= $row['is_indoor'] ? 'Oui' : 'Non' ?></td>
                                <td><?= $row['building_name'] ?></td>
                                <td><?= $row['starting_level'] ?></td>
                                <td><?= $row['rating'] ?></td>
                                <td><?= $row['special_feature'] ?></td>
                                <td onclick="editItem($row['stairs_id'])"><i class="bi bi-pencil-fill"></i></td>
                                <td onclick="deleteItem(<?= $row['stairs_id'] ?>)"><i class="bi bi-trash"></i></td>
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
<script>
    function deleteItem(id) {
        console.log(id);
        return fetch(`/stairs-list?id=${id}`, {
            method: 'DELETE'
        }).then(response => window.location.reload());
    }

    function editItem(id) {

    }
</script>

</html>