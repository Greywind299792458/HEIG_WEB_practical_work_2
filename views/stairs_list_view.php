<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starway Extravaganza</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/views/styles/stairsList.css">
    <link rel="stylesheet" href="/views/styles/style.css">
</head>

<body>
    <header>
        <nav>
            <a href="/">Stairway Extravaganza</a>
            <a href="/stairs/form">Ajouter un escalier</a>
            <a href="accidents/form">Report d'incident</a>
            <a href="/statistics">Statistiques</a>
            <a href="/stairs/list">Liste</a>
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
                                <td><?= $row['special_feature'] ?></td>
                                <td onclick="editStairs(<?php echo $row['id']; ?>)"><i class="bi bi-pencil-fill hand"></i></td>
                                <td onclick="deleteStairs(<?php echo $row['id']; ?>)"><i class="bi bi-trash-fill hand"></i></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
        <section id="info-section" class="center centered-info">
            <?php
            if (isset($deleteSuccess) && $deleteSuccess === "true") {
                echo '<p style="color: green;">L\'escalier a été supprimé avec succès!</p>';
            }
            if (isset($error) && $error !== "") {
                echo '<p style="color: red;">' . $error . '</p>';
            }
            ?>
        </section>
    </main>
</body>
<footer class="center fixed-footer">
    Ce site a été créé avec minutie par un Asperger qui adore compter les trucs et surtout les marches des escaliers.
    Qui aurait pensé que cette obsession deviendrait utile un jour pour un projet de WEB?
</footer>

<script>
    function editStairs(id) {
        window.location.href = `/stairs/form/${id}`
    }

    function deleteStairs(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cet escalier?')) {
            var xhr = new XMLHttpRequest();
            xhr.open('DELETE', '/stairs/' + id, true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var result = JSON.parse(xhr.responseText);
                    if (result.success) {
                        window.location.href = '/stairs/list?deleteSuccess=true';
                    } else {
                        window.location.href = '/stairs/list?deleteSuccess=false&error=' + encodeURIComponent(result.message);
                    }
                } else {
                    window.location.href = '/stairs/list?deleteSuccess=false&error=' + encodeURIComponent(xhr.statusText);
                }
            };
            xhr.onerror = function() {
                window.location.href = '/stairs/list?deleteSuccess=false&error=Erreur réseau lors de la suppression';
            };
            xhr.send();
        }
    }
</script>

</html>