<!DOCTYPE html>
<html>
    <head>
        <?php include 'fragments/head_content.php';?>
        <link rel="stylesheet" href="/views/styles/home.css">
    </head>
    <body>
        <?php include 'fragments/header.php';?>
        <main>
            <section class="center">
                <img height="200" src="views/assets/app_logo.png">
                <h1>Vous comptez les marches quand vous empruntez un escalier ?</h1>
                <h2>Vous détestez les escaliers avec un nombre de marches impaire ?</h2>
                <h3>Alors vous êtes au bon endroit !</h3>

                <h4>Cette application révolutionnaire a pour but d'établir un recensement des escaliers afin d'étudier
                    la répartition du nombre de marches
                </h4>
                <h4>Vous avez trouvé un escalier ? Dites le nous !</h4>
            </section>
            <section id="actions">
                <div class="btn btn-action">
                    <img height="60" src="views/assets/stairs_icon.png">
                    <a href="/stairs/form">Ajouter un escalier</a>
                </div>
            </section>
        </main>
    </body>
    <?php include 'fragments/footer.php';?>
</html>