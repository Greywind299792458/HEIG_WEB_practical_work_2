<!DOCTYPE html>
<html>
    <head>
        <?php include 'fragments/head_content.php';?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/views/styles/stairsList.css">
        <script src="/views/scripts/stairs_list.js"></script>
    </head>
    <body>
        <?php include 'fragments/header.php';?>
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
                                <th colspan="4">Avis</th>
                                <th class="no-border"></th>
                                <th class="no-border"></th>
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
                                    <?php if ($row['ratings'] === null) { ?>
                                        <td colspan="4">
                                            <button onclick="addRating(
                                                <?php echo $row['id']; ?>)">
                                                Ajouter un avis
                                            </button>
                                        </td>
                                    <?php } else { ?>
                                        <td class="no-border">
                                            <?php
                                            if (isset($row['ratings']['is_favorite']) 
                                                && $row['ratings']['is_favorite']
                                            ) {
                                                echo 'Favori <3 !';
                                            }
                                            ?>
                                        </td>
                                        <td class="no-border">
                                            <?php echo $row['ratings']['rating']; ?>
                                        </td>
                                        <td class="no-border">
                                            <button onclick="editRating(
                                                <?php echo $row['id']; ?>, 
                                                <?php echo $row['ratings']['id']; ?>)">
                                                Modifier
                                            </button>
                                        </td>
                                        <td>
                                            <button onclick="deleteRating(
                                                <?php echo $row['ratings']['id']; ?>)">
                                                Supprimer
                                            </button>
                                        </td>
                                    <?php } ?>
                                    <td class="no-border" 
                                        onclick="editStairs(
                                            <?php echo $row['id']; ?>)">
                                        <i class="bi bi-pencil-fill hand"></i>
                                    </td>
                                    <td class="no-border" 
                                        onclick="deleteStairs(
                                            <?php echo $row['id']; ?>)">
                                        <i class="bi bi-trash-fill hand"></i>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </section>
            <section id="info-section" class="center centered-info">
                <?php
                if (isset($success) && $success === "true") {
                    echo '<p style="color: white;">
                    L\'opération a été effectuée avec succès!</p>';
                }
                if (isset($error) && $error !== "") {
                    echo '<p style="color: red;">' . $error . '</p>';
                }
                ?>
            </section>
        </main>
    </body>
    <?php include 'fragments/footer.php';?>
</html>